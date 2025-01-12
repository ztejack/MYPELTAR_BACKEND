<?php

namespace App\Providers;

use App\Models\Inspeksi;
use App\Models\Maintenance;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Log::info('AuthServiceProvider boot method called');
        // // Pastikan tabel permissions sudah ada dan termigrasi
        // if (app()->runningInConsole() || !Schema::hasTable('permissions')) {
        //     return;
        // }

        // try {
        //     Permission::all()->each(function ($permission) {
        //         Gate::define($permission->name, function ($user) use ($permission) {
        //             return $user->hasPermissionTo($permission);
        //         });
        //     });
        // } catch (\Exception $e) {
        //     Log::error('Error defining Gates: ' . $e->getMessage());
        // }
        // Gate::define('store-maintenance', function ($user) {
        //     return $user->hasAnyRole(['Maintenance']);
        // });
        // Gate::define('update-maintenance', function ($user) {
        //     return $user->hasAnyRole(['SuperAdmin', 'Admin', 'Maintenance']);
        // });
        // Gate::define('store-inspeksi', function ($user) {
        //     return $user->hasAnyRole(['SuperAdmin', 'Admin', 'Inspeksi']);
        // });
        // Gate::define('update-inspeksi', function ($user) {
        //     return $user->hasAnyRole(['SuperAdmin', 'Admin', 'Inspeksi']);
        // });
        Gate::define('update-maintenance', function ($user, Maintenance $maintenance) {
            if ($user->hasAnyRole(['SuperAdmin', 'Admin'])) {
                return true;
            } elseif ($user->hasRole('Maintenance')) {
                return $maintenance->id_user == $user->id;
            }
        });
        Gate::define('update-inspeksi', function ($user, Inspeksi $inspeksi) {
            if ($user->hasAnyRole(['SuperAdmin', 'Admin'])) {
                return true;
            } elseif ($user->hasRole('Inspeksi')) {
                return $inspeksi->id_user == $user->id;
            }
        });
    }
}
