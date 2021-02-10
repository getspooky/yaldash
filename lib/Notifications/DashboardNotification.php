<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DashboardNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $message;
    public $type;
    public $name;

    public function __construct($message, $type, $name)
    {
        $this->message = $message;
        $this->type = $type;
        $this->name = $name;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using LaravelDash!');
    }

    public function toArray($notifiable)
    {
        return [
            "name"=>$this->name,
            "message"=>$this->message,
            "type"=>$this->type
        ];
    }
}
