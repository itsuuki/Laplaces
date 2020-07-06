<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageRecieved implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    public $message;
    public $request;
 
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
 
    }
 
    /**
     * イベントをブロードキャストすべき、チャンネルの取得
     *
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
 
        return new Channel('my-channel');
 
    }
 
    /**
     * ブロードキャストするデータを取得
     *
     * @return array
     */
    public function broadcastWith()
    {
 
        return [
            'message' => $this->request['message'],
            'send' => $this->request['send'],
            'recieve' => $this->request['recieve'],
        ];
    }
 
    /**
     * イベントブロードキャスト名
     *
     * @return string
     */
    public function broadcastAs()
    {
 
        return 'my-event';
    }
}
