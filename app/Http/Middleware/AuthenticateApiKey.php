<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

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
        //only for production not deployment

        $client = Client::where('name', 'mypeltar_test')->first();
        $request->merge(['client' => $client]);

        return $next($request);

        //only for production not deployment

        $apiKey = $request->header(config('app.api_key_header', 'MYP-API-KEY'));

        if (!$apiKey) {
            Log::warning('API request made without API key');
            return $this->errorResponse('Missing API Key');
        }

        // Rate limiting
        $limiter = app(RateLimiter::class);
        if ($limiter->tooManyAttempts($apiKey, $perMinute = 60)) {
            Log::warning('Too many requests: ' . $apiKey . ' :: ' . $perMinute);
            return $this->errorResponse('Too many requests', Response::HTTP_TOO_MANY_REQUESTS);
        }
        $limiter->hit($apiKey, 60);

        $client = Client::where('api_key', $apiKey)->first();

        if (!$client) {
            Log::warning('Invalid API key used: ' . $apiKey);
            return $this->errorResponse('Invalid API Key');
        }

        // Store the client in the request for later use if needed
        $request->merge(['client' => $client]);

        return $next($request);
    }

    /**
     * Return a JSON error response.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    private function errorResponse($message, $status = Response::HTTP_UNAUTHORIZED)
    {
        return response()->json([
            'status' => 'fails',
            'message' => $message,
        ], $status);
    }
}
