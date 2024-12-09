<?php

namespace App\Policies;

use App\Models\Subsatker;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubsatkerPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storesubsatker(User $user, Subsatker $subsatker)
    {
        return $user->hasPermissionTo('store-subsatker');
    }

    public function updatesubsatker(User $user, Subsatker $subsatker)
    {
        return $user->hasPermissionTo('update-subsatker');
    }

    public function deletesubsatker(User $user, Subsatker $subsatker)
    {
        return $user->hasPermissionTo('delete-subsatker');
    }

}