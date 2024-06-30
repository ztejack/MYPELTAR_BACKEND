<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;

/**
 * @group AUTH
 *
 */

class AuthController extends Controller
{
    public function login_view()
    {
        $key = 1;
        return view('auth.login_view',[
            'key'=> $key
        ]);
    }
    public function login()
    {
        return view('auth.login_view');
    }
}
