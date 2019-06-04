<?php

namespace Yasser\LaravelDashboard\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $payload = null;

    /**
     * Create a new event instance.
     * @param array $payload
     * @return void
     */

    public function __construct(array $payload)
    {
        //

        $this->payload = $payload;
    }
}
