<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('MYP-API-KEY');

        if (!$apiKey) {
            return response()->json([
                'error' => 'API key is missing'
            ], 401);
        }

        // Find the user by the API key
        // $user = User::where('apiKey', $apiKey)->first();
        $user = User::whereHas('apiKey', function ($query) use ($apiKey) {
            $query->where('api_key', $apiKey);
        })->first();


        if (!$user) {
            return response()->json([
                'error' => 'Invalid API key'
            ], 401);
        }

        // Authenticate the user
        Auth::login($user);

        return $next($request);
    }
}
