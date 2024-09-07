<?php

/*
 * This file is part of the Laravel Budpay package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace lonly\Budpay;

use Illuminate\Support\ServiceProvider;

class BudpayServiceProvider extends ServiceProvider
{
    /**
     * Bootstraps the package services.
     *
     * Publishes the configuration file required by the package.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/budpay.php';

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $configPath => config_path('budpay.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge default config with user-configured values
        $this->mergeConfigFrom(
            __DIR__ . '/../config/budpay.php', 'budpay'
        );

        // Register the Budpay service as a singleton
        $this->app->singleton('laravel-budpay', function ($app) {
            return new Budpay(config('budpay'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-budpay'];
    }
}
