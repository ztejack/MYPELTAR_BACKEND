<?php

namespace App\Policies;

use App\Models\satker;
use Illuminate\Auth\Access\HandlesAuthorization;
use LdapRecord\Models\OpenLDAP\User;

class SatkerPolicy
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
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, satker $satker)
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
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, satker $satker)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, satker $satker)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, satker $satker)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, satker $satker)
    {
        //
    }
}
