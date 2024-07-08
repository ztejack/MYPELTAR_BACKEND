<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Scribe;
use Symfony\Component\HttpFoundation\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Be sure to wrap in a `class_exists()`,
        // so production doesn't break if you installed Scribe as dev-only
        if (class_exists(\Knuckles\Scribe\Scribe::class)) {
            Scribe::beforeResponseCall(function (Request $request, ExtractedEndpointData $endpointData) {
                // $token = User::first()->getJWTIdentifier();
                $token = env('SCRIBE_AUTH_KEY_BEARER');
                $api_key = env('SCRIBE_AUTH_KEY_API');
                // dd($token);
                $request->headers->add([
                    "Authorization" => "Bearer $token",
                    "MYP-API-KEY" => $api_key
                ]);
            });
        }
    }
}
