<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDashboard\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $payload = null;

    /**
     * Create a new event instance.
     *
     * @param array $payload
     * @return void
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }
}
