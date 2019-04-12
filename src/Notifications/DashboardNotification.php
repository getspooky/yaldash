<?php

namespace Yasser\LaravelDashboard\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DashboardNotification extends Notification implements ShouldQueue
{

    use Queueable;

    public $message,$type,$name;

    /**
     * Create a new notification instance.
     * @param $message
     * @param $type
     * @param string $name
     * @return void
     */

     public function __construct($message,$type,$name)
     {
        //

         $this->message = $message;

         $this->type = $type;

         $this->name = $name;

     }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function toArray($notifiable)
    {

        return [
            "name"=>$this->name,
            "message"=>$this->message,
            "type"=>$this->type
        ];

    }

}
