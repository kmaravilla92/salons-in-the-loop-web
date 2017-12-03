<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HttpClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HttpClient::class, function(){
            return new HttpClient([
                'base_uri' => config('app.api.base_uri'),
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer '. config('app.api.access_token')
                ]
            ]);
        });
    }
}
