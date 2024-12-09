<?php

namespace App\Policies;

use App\Models\Satker;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SatkerPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storesatker(User $user, Satker $satker)
    {
        return $user->hasPermissionTo('store-satker');
    }

    public function updatesatker(User $user, Satker $satker)
    {
        return $user->hasPermissionTo('update-satker');
    }

    public function deletesatker(User $user, Satker $satker)
    {
        return $user->hasPermissionTo('delete-satker');
    }

}