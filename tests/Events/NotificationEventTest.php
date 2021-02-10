<?php
/*
 * This file is part of the yaldash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Tests\Events;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use yal\laraveldash\Events\NotificationEvent;

class NotificationEventTest extends TestCase
{
    public function testCanDispatchEventNotification()
    {
        Event::fake();
        $user = Auth::loginUsingId(1);
        event(new NotificationEvent(
            [
            'message'=>$user->name.' has published a new Post',
            'type'=>'post',
            'name'=>$user->name,
            'to'=>'auth']
        ));
        Event::assertDispatched(NotificationEvent::class, function ($event) use ($user) {
            return $event->payload['type'] === 'post' && $event->payload['message'] === $user->name.' has published a new Post'
                && $event->payload['name'] === $user->name && $event->payload['to'] === 'auth';
        });
    }
}
