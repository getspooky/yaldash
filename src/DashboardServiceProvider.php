<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 24/02/19
 * Time: 17:09
 */
namespace Yasser\LaravelDashboard;
use Cartalyst\Stripe\Laravel\StripeServiceProvider;
use \Illuminate\Support\ServiceProvider;
use Yasser\LaravelDashboard\Commands\DashboardTemplate;
use Yasser\LaravelDashboard\Commands\GenerateAuthentification;
use Yasser\LaravelDashboard\Commands\LaravelDashInstall;
use Yasser\LaravelDashboard\Providers\EventServiceProvider;

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

        $this->app->alias('Stripe',Cartalyst\Stripe\Laravel\Facades\Stripe::class);

    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */

    public function boot()
    {

        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views','LaravelDashboard');

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        $this->publishes([
            __DIR__ . '/Config/laravelDash.php' => config_path('laravelDash.php')
        ],"config");


        if ($this->app->runningInConsole()) {
            $this->commands([
               DashboardTemplate::class,
               GenerateAuthentification::class,
               LaravelDashInstall::class
            ]);
        }


    }




}
