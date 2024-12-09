<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionDebugger
{
    public static function logPermissionCheck($user, $permissionName)
    {
        Log::channel('permission_debug')->info("Checking permission '{$permissionName}' for user {$user->id}");

        // Log user roles
        $roles = $user->getRoleNames()->toArray();
        Log::channel('permission_debug')->info("User roles: " . implode(', ', $roles));

        // Log permissions via roles
        $permissionsViaRoles = $user->getPermissionsViaRoles()->pluck('name')->toArray();
        Log::channel('permission_debug')->info("Permissions via roles: " . implode(', ', $permissionsViaRoles));

        // Check if the permission exists
        $permissionExists = Permission::where('name', $permissionName)->exists();
        Log::channel('permission_debug')->info("Permission '{$permissionName}' exists in database: " . ($permissionExists ? 'Yes' : 'No'));

        // Check direct permission
        $hasDirect = $user->hasDirectPermission($permissionName);
        Log::channel('permission_debug')->info("User has direct permission: " . ($hasDirect ? 'Yes' : 'No'));

        // // Check permission via roles
        // $hasViaRoles = $user->hasPermissionViaRole($permissionName);
        // Log::channel('permission_debug')->info("User has permission via role: " . ($hasViaRoles ? 'Yes' : 'No'));

        // Final check
        $finalCheck = $user->hasPermissionTo($permissionName);
        Log::channel('permission_debug')->info("Final hasPermissionTo check result: " . ($finalCheck ? 'Yes' : 'No'));
    }

    public static function verifyPackageInstallation()
    {
        // Check if the Permission model exists
        $permissionModelExists = class_exists(Permission::class);
        Log::info("Spatie Permission model exists: " . ($permissionModelExists ? 'Yes' : 'No'));

        // Check if the roles table exists
        $rolesTableExists = Schema::hasTable('roles');
        Log::info("Roles table exists: " . ($rolesTableExists ? 'Yes' : 'No'));

        // Check if the permissions table exists
        $permissionsTableExists = Schema::hasTable('permissions');
        Log::info("Permissions table exists: " . ($permissionsTableExists ? 'Yes' : 'No'));

        // Check if the role_has_permissions table exists
        $roleHasPermissionsTableExists = Schema::hasTable('role_has_permissions');
        Log::info("role_has_permissions table exists: " . ($roleHasPermissionsTableExists ? 'Yes' : 'No'));

        // Check if any roles exist
        $rolesCount = Role::count();
        Log::info("Number of roles in the database: {$rolesCount}");

        // Check if any permissions exist
        $permissionsCount = Permission::count();
        Log::info("Number of permissions in the database: {$permissionsCount}");
    }

    public static function checkAuthorizationConflicts()
    {
        // Check for Laravel's default Gates
        $gates = Gate::abilities();
        Log::info("Registered Gates: " . implode(', ', array_keys($gates)));

        // Check for Laravel's Policies
        $policies = Gate::policies();
        Log::info("Registered Policies: " . implode(', ', array_keys($policies)));

        // Check if any other authorization packages are installed
        $composerLock = json_decode(file_get_contents(base_path('composer.lock')), true);
        $packages = array_column($composerLock['packages'], 'name');
        $authPackages = array_filter($packages, function ($package) {
            return strpos($package, 'auth') !== false || strpos($package, 'acl') !== false;
        });
        Log::info("Installed authorization-related packages: " . implode(', ', $authPackages));
    }
}
