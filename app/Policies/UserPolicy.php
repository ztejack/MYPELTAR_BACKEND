<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storeusers(User $user)
    {
        return $user->hasPermissionTo('store-users');
    }

    public function updateusers(User $user)
    {
        return $user->hasPermissionTo('update-users');
    }

    public function deleteusers(User $user)
    {
        return $user->hasPermissionTo('delete-users');
    }

    public function getallusers(User $user)
    {
        return $user->hasPermissionTo('getall-users');
    }

    public function searchusers(User $user)
    {
        return $user->hasPermissionTo('search-users');
    }

    public function showusers(User $user)
    {
        return $user->hasPermissionTo('show-users');
    }
}
