<?php

namespace App\Listeners;

use App\Events\PrayerRequestApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPrayerRequestNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PrayerRequestApproved  $event
     * @return void
     */
    public function handle(PrayerRequestApproved $event)
    {
        $prayerRequest  = $event->getPrayerRequest();

        $MessageBird = new \MessageBird\Client(env('MESSAGEBIRD_ACCESS_KEY'));

        $Message = new \MessageBird\Objects\Message();
        $Message->originator = env('MESSAGEBIRD_ORIGINATOR');
        $Message->recipients = [
            env('MESSAGEBIRD_RECIPIENT')
        ];

        $Message->body = $prayerRequest->text;

        $response = $MessageBird->messages->create($Message);

//        $prayerRequest->prayerTree->subscribers
//            ->each(function($contact) use ($prayerRequest) {
//                $contact->notify($prayerRequest);
//            });
    }
}
