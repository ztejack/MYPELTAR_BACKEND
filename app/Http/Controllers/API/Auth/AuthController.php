<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Resources\ApiKeyResource;
use App\Http\Resources\UserResource;
use App\Models\ApiKey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * @group AUTH
 *
 */

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'forgotPassword', 'resetPassword']]);
    }

    /**
     * Log in.
     *
     * @Unauthenticated
     *
     * Otherwise, the request will fail with a 422 error, and a response listing the Wrong credential.
     *
     * @bodyParam   login    string  required    The Email or Username of the  user.      Example: exampleuser / example@example.com
     * @bodyParam   password    string  required    The password of the  user.   Example: secret
     *
     * @response 404 scenario="Unprocessable Content" {"status":"fails","message": "Wrong username"}
     * @responseField login The login of this User must be `string` login mean using email or username of user
     * @responseField password The password of this User must be `string`
     * @responseField status Map of each request their status (`success` or `fails`).
     *
     * @response 200 scenario="Ok"
     * {
     *      "status" : "success",
     *      "user" : `User Object` ,
     *      "authorisation" : {
     *          "token" : "eyJ0eXAiO . . .",
     *          "type" : "bearer" }
     * }
     */
    public function login(LoginRequest $request)
    {

        $login = $request->input('login');
        $password = $request->input('password');

        // Check if login is email or username
        $credentials = filter_var($login, FILTER_VALIDATE_EMAIL) ?
            ['email' => $login, 'password' => $password] :
            ['username' => $login, 'password' => $password];

        if (!$token = Auth::attempt($credentials, true)) {
            return response()->json([
                'status' => 'fails',
                'message' => 'Wrong Password',
            ], 422);
        }

        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => new UserResource($user),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
            // 'api-key' => new ApiKeyResource($user->apikey)
        ], 200);
    }

    /**
     * Log out
     *
     * Log out the user and delete the token.
     *
     * @response 200 scenario="Ok"
     * {
     *  "status": "success",
     *  "message": "Successfully logged out"
     * }
     */
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ], 200);
    }

    /**
     * Refresh
     *
     * @response 200 scenario="Ok"
     * {
     *      "status" : "success",
     *      "user" : `User Object` ,
     *      "authorisation" : {
     *          "token" : "eyJ0eXAiO . . .",
     *          "type" : "bearer"
     *      }
     * }
     */
    public function refresh()
    {
        try {
            $user = Auth::user();

            return response()->json([
                'status' => 'success',
                'user' => new UserResource(Auth::user()),
                'authorisation' => [
                    'token' => Auth::refresh(),
                    'type' => 'bearer',
                ],
            ], 200);
        } catch (\Throwable $th) {
            // Handle the exception
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while refresh token.'
            ], 500);
        }
    }

    /**
     * Profile
     *
     * Give respons of profile the user.
     *
     * @response 200 scenario="Ok"
     * {
     *   "status": "success",
     *   "user": {
     *     "nama": "SomeUser",
     *     "email": "someuser@example.com",
     *     "username": "someuser",
     *     "role": [
     *       "someAdmin"
     *     ],
     *     "subsatker": "IT",
     *     "satker": "Perawatan"
     *   }
     * }
     */
    public function profile()
    {
        $auth = Auth::user();
        return response()->json(
            [
                'status' => 'success',
                'user' => new UserResource($auth),
            ],
            200
        );
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return response()->json([
            'status' => $status === Password::RESET_LINK_SENT ? 'success' : 'failed',
            'message' => __($status)
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Token is required in query parameters.',
            ], 422);
        }

        $status = Password::reset(
            [
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'token' => $token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::INVALID_TOKEN) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid or expired token.',
            ], 404);
        }

        return response()->json([
            'status' => $status === Password::PASSWORD_RESET ? 'success' : 'failed',
            'message' => __($status),
        ]);
    }
}
