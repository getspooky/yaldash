<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $payload = null;

    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }
}
