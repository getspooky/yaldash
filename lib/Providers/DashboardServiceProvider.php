<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDashboard\Providers;

use Cartalyst\Stripe\Laravel\StripeServiceProvider;
use \Illuminate\Support\ServiceProvider;
use LaravelDashboard\Commands\DashboardTemplate;
use LaravelDashboard\Commands\GenerateAuthentication;
use LaravelDashboard\Commands\LaravelDashInstall;
use LaravelDashboard\Commands\LaravelDashInstall5;

class DashboardServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(StripeServiceProvider::class);
        $this->app->alias('Stripe', Cartalyst\Stripe\Laravel\Facades\Stripe::class);
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'LaravelDashboard');
        $this->loadMigrationsFrom(__DIR__ . '/../../migrations');
        $this->publishes([
            __DIR__ . '/../Configuration.php' => config_path('laravelDashboard.php')
        ], "config");
        $this->publishes([
            __DIR__ . '/../../published' => public_path('published')
        ], 'laravelDash-assets');
        if ($this->app->runningInConsole()) {
            $this->commands([
                DashboardTemplate::class,
                GenerateAuthentication::class,
                LaravelDashInstall::class,
                LaravelDashInstall5::class
            ]);
        }
    }
}
