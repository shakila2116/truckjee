<?php

namespace TruckJee\Events;

use TruckJee\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use TruckJee\Models\Transporter\Requirement;
class RequirementCreated extends Event
{
    use SerializesModels;
    public $requirement;

    /**
     * RequirementCreated constructor.
     * @param Requirement $requirement
     */
    public function __construct(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
            return [];
    }
}
