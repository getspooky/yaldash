<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Providers;

use Cartalyst\Stripe\Laravel\StripeServiceProvider;
use \Illuminate\Support\ServiceProvider;
use yal\laraveldash\Commands\DashboardTemplate;
use yal\laraveldash\Commands\LaravelDashInstall;

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
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravelDash');
        $this->loadMigrationsFrom(__DIR__ . '/../../migrations');
        $this->publishes([
            __DIR__ . '/../Configuration.php' => config_path('laraveldash.php')
        ], "laravelDash-config");
        $this->publishes([
            __DIR__ . '/../../published' => public_path('published')
        ], 'laravelDash-assets');
        if ($this->app->runningInConsole()) {
            $this->commands([
                DashboardTemplate::class,
                LaravelDashInstall::class
            ]);
        }
    }
}
