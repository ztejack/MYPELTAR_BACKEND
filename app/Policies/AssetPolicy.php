<?php

namespace App\Policies;

use App\Models\asset;
use Illuminate\Auth\Access\HandlesAuthorization;
use LdapRecord\Models\OpenLDAP\User;

class AssetPolicy
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
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, asset $asset)
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
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, asset $asset)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, asset $asset)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, asset $asset)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, asset $asset)
    {
        //
    }
}
