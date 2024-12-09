<?php

namespace App\Policies;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssetPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storeasset(User $user, Asset $asset)
    {
        return $user->hasPermissionTo('store-asset');
    }

    public function updateasset(User $user, Asset $asset)
    {
        return $user->hasPermissionTo('update-asset');
    }

    public function deleteasset(User $user, Asset $asset)
    {
        return $user->hasPermissionTo('delete-asset');
    }

}