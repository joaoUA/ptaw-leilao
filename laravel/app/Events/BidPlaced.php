<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BidPlaced implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bid;

    public function __construct($bid)
    {
        $this->bid = $bid;
    }

    public function broadcastOn(): array
    {
        return ['public'];
    }

    public function broadcastAs(): string {
        return 'bid-placed';
    }

    public static function dispatch($bid)
    {
        event(new self($bid));
    }
}