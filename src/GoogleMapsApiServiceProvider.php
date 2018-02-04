<?php

namespace Niddit\Google\Maps\Laravel;

use GuzzleHttp\Client;
use Niddit\Google\Maps\Auth;
use Illuminate\Support\ServiceProvider;
use Niddit\Google\Maps\Service\Places\PlacesApi;

class GoogleMapsApiServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PlacesApi::class, function($app) {
            return new PlacesApi(new Client(), Auth::fromKey(env('GOOGLE_API_KEY')));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            PlacesApi::class
        ];
    }
}
