<?php

namespace App\Policies;

use App\Models\maintenance;
use Illuminate\Auth\Access\HandlesAuthorization;
use LdapRecord\Models\OpenLDAP\User;

class MaintenancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, maintenance $maintenance)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, maintenance $maintenance)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, maintenance $maintenance)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, maintenance $maintenance)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, maintenance $maintenance)
    {
        //
    }
}
