<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storecategory(User $user, Category $category)
    {
        return $user->hasPermissionTo('store-category');
    }

    public function updatecategory(User $user, Category $category)
    {
        return $user->hasPermissionTo('update-category');
    }

    public function deletecategory(User $user, Category $category)
    {
        return $user->hasPermissionTo('delete-category');
    }

}