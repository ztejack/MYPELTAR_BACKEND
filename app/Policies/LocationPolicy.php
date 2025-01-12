<?php

namespace App\Policies;

use App\Models\Location;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storelocation(User $user, Location $location)
    {
        return $user->hasPermissionTo('store-location');
    }

    public function updatelocation(User $user, Location $location)
    {
        return $user->hasPermissionTo('update-location');
    }

    public function deletelocation(User $user, Location $location)
    {
        return $user->hasPermissionTo('delete-location');
    }

}