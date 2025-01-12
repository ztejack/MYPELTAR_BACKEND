<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GeneratePoliciesFromPermissions extends Command
{
    protected $signature = 'generate:policies';
    protected $description = 'Generate policies from permissions';

    public function handle()
    {
        $permissions = $this->getPermissions();
        $models = $this->groupPermissionsByModel($permissions);

        foreach ($models as $model => $modelPermissions) {
            $this->generatePolicy($model, $modelPermissions);
        }

        $this->info('Policies generated successfully!');
    }

    private function getPermissions()
    {
        // Assuming you're using Spatie's permission package
        return \Spatie\Permission\Models\Permission::all()->pluck('name');
    }

    private function groupPermissionsByModel($permissions)
    {
        $models = [];
        foreach ($permissions as $permission) {
            $parts = explode('-', $permission);
            if (count($parts) >= 2) {
                $model = Str::studly(Str::singular($parts[1]));
                $action = $parts[0];
                $models[$model][] = $action;
            }
        }
        return $models;
    }

    private function generatePolicy($model, $permissions)
    {
        $policyPath = app_path("Policies/{$model}Policy.php");
        $policyContent = $this->getPolicyTemplate($model, $permissions);

        File::put($policyPath, $policyContent);
        $this->info("Generated policy for {$model}");
    }

    private function getPolicyTemplate($model, $permissions)
    {
        $methods = $this->generatePolicyMethods($model, $permissions);

        return <<<EOT
<?php

namespace App\Policies;

use App\Models\\{$model};
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class {$model}Policy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

{$methods}
}
EOT;
    }

    private function generatePolicyMethods($model, $permissions)
    {
        $methods = '';
        $modelVariable = Str::camel($model);
        foreach ($permissions as $permission) {
            $methods .= <<<EOT

    public function {$permission}{$modelVariable}(User \$user, {$model} \${$modelVariable})
    {
        return \$user->hasPermissionTo('{$permission}-{$modelVariable}');
    }

EOT;
        }
        return $methods;
    }
}
