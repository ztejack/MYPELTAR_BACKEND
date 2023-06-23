<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiKeyResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

/**
 * @group AUTH
 *
 */

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Log in.
     * 
     * @Unauthenticated
     * 
     * Otherwise, the request will fail with a 422 error, and a response listing the Wrong credential.
     * 
     * @bodyParam   username    string  required    The username of the  user.      Example: username
     * @bodyParam   password    string  required    The password of the  user.   Example: secret
     * 
     * @response 422 scenario="Unprocessable Content" {"status":"fails","message": "Wrong Username"}
     * @responseField username The username of this User must be `string` 
     * @responseField password The password of this User must be `string`
     * @responseField status Map of each request their status (`success` or `fails`).
     *
     * @response 200 scenario="Ok" 
     * {
     *      "status" : "success", 
     *      "user" : `User Object` , 
     *      "authorisation" : { 
     *          "token" : "eyJ0eXAiO . . .",
     *          "type" : "bearer" }, 
     *      "api-key" : {
     *          "api_key" : "c4ksKs . . .", 
     *          "expiration_date" : "2023-07-15 17:31:00"
     *      }
     * }
     */

    public function login(Request $request)
    {
        
        $validatedData = Validator::make($request->all(),[
            'username' => ['required',Rule::exists('users', 'username')],
        ]);
        if ($validatedData->fails()) {
            return response()->json([
                'status'=>'fails',
                'message' => 'Wrong Username',
            ], 422);
        };

        $credentials = [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ];
        
        $token = Auth::attempt($credentials, true);
        if (!$token) {
            return response()->json([
                'status'=>'fails',
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
            'api-key' => new ApiKeyResource($user->apiKey)
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
     *      }, 
     * }
     */
    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => new UserResource(Auth::user()),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ], 200);
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
}
