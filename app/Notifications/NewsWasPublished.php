<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Nigeriabulksms\NigeriabulksmsChannel;
use NotificationChannels\Nigeriabulksms\NigeriabulksmsMessage;

class NewsWasPublished extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return [NigeriabulksmsChannel::class];
    }

    public function toNigeriabulksms($notifiable)
    {
        return (new NigeriabulksmsMessage("Your {$notifiable->service} was ordered!"))->setRecipients('08029991710');
    }
}
