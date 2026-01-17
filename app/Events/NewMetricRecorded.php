<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMetricRecorded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $siteId;

    public function __construct($siteId)
    {
        $this->siteId = $siteId;
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('site.' . $this->siteId);
    }

    public function broadcastAs()
    {
        return 'new-metric';
    }
}
