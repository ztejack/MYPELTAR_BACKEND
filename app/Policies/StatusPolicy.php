<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storestatus(User $user, Status $status)
    {
        return $user->hasPermissionTo('store-status');
    }

    public function updatestatus(User $user, Status $status)
    {
        return $user->hasPermissionTo('update-status');
    }

    public function deletestatus(User $user, Status $status)
    {
        return $user->hasPermissionTo('delete-status');
    }

}