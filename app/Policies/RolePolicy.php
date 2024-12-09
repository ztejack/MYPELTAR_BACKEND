<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function managementrole(User $user, Role $role)
    {
        return $user->hasPermissionTo('management-role');
    }
}
