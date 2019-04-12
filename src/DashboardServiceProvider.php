<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 24/02/19
 * Time: 17:09
 */
namespace Yasser\LaravelDashboard;
use \Illuminate\Support\ServiceProvider;
use Yasser\LaravelDashboard\Commands\DashboardTemplate;
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


        $this->publish_factories();


        if ($this->app->runningInConsole()) {
            $this->commands([
               DashboardTemplate::class,
            ]);
        }


    }


    /**
     * Publish Factories
     */

     public function publish_factories(){

        $this->publishes([
            __DIR__.'/Tests/Database/factories/StoreFactory.php' => database_path('factories/StoreFactory.php'),
            __DIR__.'/Tests/Database/factories/PostFactory.php' => database_path('factories/PostFactory.php'),
            __DIR__.'/Tests/Database/factories/CategorieFactory.php' => database_path('factories/CategorieFactory.php'),
        ]);

     }


}
