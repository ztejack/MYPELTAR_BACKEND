<?php

namespace App\Policies;

use App\Models\banner;
use Illuminate\Auth\Access\HandlesAuthorization;
use LdapRecord\Models\OpenLDAP\User;

class BannerPolicy
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
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, banner $banner)
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
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \LdapRecord\Models\OpenLDAP\User  $user
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, banner $banner)
    {
        //
    }
}
