<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Listeners;

use App\User;
use yal\laraveldash\Events\NotificationEvent;
use yal\laraveldash\Notifications\DashboardNotification;

class NotificationListeners
{

    public function __construct()
    {
        //
    }

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
