<?php

namespace App\Events;

use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

 public $message;

    public function __construct(Message $message)
    {
       $this->message=$message;
    }


    public function broadcastOn()
    {
        return ['chat'];
    }

//    public function broadcastWith(){
//        return [
//          'time'=>microtime(),
//            'version'=>0.1
//        ];
//    }

    public function broadcastAs(){
        return 'message';
    }
}
