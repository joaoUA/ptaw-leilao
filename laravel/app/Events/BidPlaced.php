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
    public $auctionId;

    public function __construct($bid, $auctionId)
    {
        $this->bid = $bid;
        $this->auctionId = $auctionId;
    }

    public function broadcastOn()
    {
        return new Channel('auction.' . $this->auctionId);
    }

    public function broadcastAs(): string {
        return 'bid-placed';
    }

    public static function dispatch($bid, $auctionId)
    {
        event(new self($bid, $auctionId));
    }
}