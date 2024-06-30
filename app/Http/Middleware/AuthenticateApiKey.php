<?php

namespace App\Http\Middleware;

use App\Models\Client;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        $apiKey  = $request->header('MYP-API-KEY');

        if (!$apiKey) {
            return response()->json(['error' => 'API Key not provided'], 401);
        }
        // Encrypt the API key obtained from the request header
        // $apiKey = Crypt::encryptString($encryptedApiKey);

        $client = Client::where('api_key', $apiKey)->first();

        if (!$client) {
            return response()->json(['error' => $apiKey], 401);
        }

        // Store the client in the request for later use if needed
        $request->merge(['client' => $client]);

        return $next($request);
    }
}
