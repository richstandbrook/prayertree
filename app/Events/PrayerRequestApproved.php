<?php

namespace App\Events;

use App\PrayerRequest;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PrayerRequestApproved
{
    use InteractsWithSockets, SerializesModels;
    /**
     * @var PrayerRequest
     */
    private $prayerRequest;

    /**
     * Create a new event instance.
     *
     * @param PrayerRequest $prayerRequest
     */
    public function __construct(PrayerRequest $prayerRequest)
    {
        $this->prayerRequest = $prayerRequest;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * @return PrayerRequest
     */
    public function getPrayerRequest()
    {
        return $this->prayerRequest;
    }
}
