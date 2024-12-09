<?php

namespace App\Policies;

use App\Models\Inspeksi;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InspeksiPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storeinspeksi(User $user, Inspeksi $inspeksi)
    {
        return $user->hasPermissionTo('store-inspeksi');
    }

    public function updateinspeksi(User $user, Inspeksi $inspeksi)
    {
        return $user->hasPermissionTo('update-inspeksi');
    }

}