<?php

namespace LdapRecord\Laravel\Auth;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

trait CreatesUserProvider
{
    /**
     * Attempt to retrieve the authenticated guard name.
     *
     * @return string|null
     */
    protected function getCurrentAuthGuard()
    {
        foreach (Config::get('auth.guards') as $guard => $config) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }
    }

    /**
     * Get the guard's authentication user provider.
     *
     * @param string $guard
     *
     * @return \Illuminate\Contracts\Auth\UserProvider|null
     */
    protected function getCurrentAuthProvider($guard)
    {
        if ($guard === 'sanctum') {
            $guard = Arr::first(
                Arr::wrap(Config::get('sanctum.guard', 'web'))
            );
        }

        return Auth::createUserProvider(
            Config::get("auth.guards.$guard.provider")
        );
    }
}
