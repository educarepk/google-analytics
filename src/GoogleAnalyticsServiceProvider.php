<?php

namespace Educare\Analytics;

use Illuminate\Support\ServiceProvider;

class GoogleAnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/analytics.php' => config_path('analytics.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('analytics', function ($app) {
            return new Analytics($app);
        });

        $this->app->bind(
            'Educare\Analytics\Contracts\Analytics',
            'Educare\Analytics\Analytics'
        );
    }
}
