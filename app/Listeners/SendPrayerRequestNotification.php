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
        //
    }
}
