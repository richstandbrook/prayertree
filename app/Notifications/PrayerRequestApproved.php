<?php

namespace App\Notifications;

use App\PrayerRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Messagebird\MessagebirdChannel;
use NotificationChannels\Messagebird\MessagebirdMessage;

class PrayerRequestApproved extends Notification
{
    use Queueable;
    /**
     * @var PrayerRequest
     */
    private $prayerRequest;

    /**
     * Create a new notification instance.
     *
     * @param PrayerRequest $prayerRequest
     */
    public function __construct(PrayerRequest $prayerRequest)
    {
        $this->prayerRequest = $prayerRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [MessagebirdChannel::class];
    }

    public function toMessageBird($notifiable)
    {
        return (new MessagebirdMessage("PT: {$notifiable->message}"))
            ->setRecipients($notifiable->number);
    }
}
