<?php

namespace App\Providers;

use App\Http\Classes\VerificationCode;
use Illuminate\Support\ServiceProvider;

class VerificationCodeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
     protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(VerificationCode::class, function ($app) {
            return new VerificationCode(config('app.expires'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [VerificationCode::class];
    }
}
