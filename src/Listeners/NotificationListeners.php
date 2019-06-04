<?php

namespace Yasser\LaravelDashboard\Listeners;

use Yasser\LaravelDashboard\Events\NotificationEvent;
use Yasser\LaravelDashboard\Notifications\DashboardNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class NotificationListeners
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificationEvent  $event
     * @return void
     */

    public function handle(NotificationEvent $event)
    {
        //

        $user = $event->payload['to'] === 'auth' ? auth()->user() : User::all();

        $when = now()->addSeconds(30);

        $user->notify((new DashboardNotification($event->payload['message'], $event->payload['type'], $event->payload['name']))->delay($when));
    }
}
