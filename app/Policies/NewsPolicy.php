<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function storenews(User $user, News $news)
    {
        return $user->hasPermissionTo('store-news');
    }

    public function updatenews(User $user, News $news)
    {
        return $user->hasPermissionTo('update-news');
    }

    public function deletenews(User $user, News $news)
    {
        return $user->hasPermissionTo('delete-news');
    }

}