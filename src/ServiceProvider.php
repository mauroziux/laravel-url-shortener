<?php

/**
 * Laravel service provider for registering the routes and publishing the configuration.
 */

namespace Mauroziux\Laravel\URLShortener;

use Mauroziux\Laravel\URLShortener\Console\URLShortenerCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function boot()
    {

        $configuration = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'urlshortener.php';

        $this->publishes(
            [
                $configuration => config_path('urlshortener.php'),
            ]
        );

        $this->mergeConfigFrom(
            $configuration,
            'urlshortener'
        );

        $this->loadMigrationsFrom(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations');

        $this->loadViewsFrom(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views', 'urlshortener');

        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');

        $this->publishes(
            [
                __DIR__ . '/../views' => resource_path('views/vendor/urlshortener'),
            ]
        );

        $this->commands(
            [
                URLShortenerCommand::class
            ]
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
