<?php

namespace App\Policies;

use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaintenancePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function deletemaintenance(User $user, Maintenance $maintenance)
    {
        return $user->hasPermissionTo('delete-maintenance');
    }

}