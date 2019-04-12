<?php


namespace Yasser\LaravelDashboard\Providers;


use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Yasser\LaravelDashboard\Events\NotificationEvent;
use Yasser\LaravelDashboard\Listeners\NotificationListeners;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NotificationEvent::class=>[
            NotificationListeners::class
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

        parent::boot();

        //
    }

}
