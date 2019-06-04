<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 26/03/19
 * Time: 14:45
 */

namespace Yasser\LaravelDashboard\Tests\Events;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Yasser\LaravelDashboard\Events\NotificationEvent;

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
