<?php


namespace LaravelDashboard\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use LaravelDashboard\Events\NotificationEvent;
use LaravelDashboard\Listeners\NotificationListeners;

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
    }
}
