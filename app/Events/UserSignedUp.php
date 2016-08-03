<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserSignedUp extends Event implements ShouldBroadcast
{
    use SerializesModels;

    // Laravel Only Serialise and publish public properties when you broadcast events. Not if it is protected or private
    public $username;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        $this->username = $username;

        /*
        $data = [
            'event' => 'UserSignedUp',
            'data' => [
                'username' => 'JohnDoe'
            ]
        ];
        */
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['test-channel'];
    }
}
