<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDashboard\Listeners;

use App\User;
use LaravelDashboard\Events\NotificationEvent;
use LaravelDashboard\Notifications\DashboardNotification;

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
        $user = $event->payload['to'] === 'auth' ? auth()->user() : User::all();
        $when = now()->addSeconds(30);
        $user->notify((new DashboardNotification(
          $event->payload['message'],
          $event->payload['type'],
          $event->payload['name']))->delay($when)
        );
    }
}
