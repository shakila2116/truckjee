<?php

namespace TruckJee\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use TruckJee\Events\RequirementCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use TruckJee\Models\TruckOwner\Truck;


class RequirementCreatedListener implements ShouldQueue
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
     * @param  RequirementCreated  $event
     * @return void
     */
    public function handle(RequirementCreated $event)
    {
        $user_emails = [];
        $user_phones = [];
        Log::info('Entered requirement listener : '.$event->requirement->id);
        $trucks = Truck::GetEmptyTrucks($event->requirement->truck_type, $event->requirement->source_district, $event->requirement->source_locality);
        foreach($trucks as $truck)
        {
            array_push($user_emails,($truck->owner()->email));
            array_push($user_phones,($truck->owner()->phone));
        }
        $this->emailRequirementsToOwner($user_emails, $event->requirement->toArray());
        $this->smsRequirementsToOwner($user_phones);
        Log::info("Mail and sms queued for requirement : ".$event->requirement->id);
    }

    /**
     * Mail the users who have an empty truck at the location
     *
     * @param array $user_emails
     * @param array $requirement
     */
    public function emailRequirementsToOwner(array $user_emails, array $requirement)
    {
        Mail::queue('emails.requirements.newRequirement',
                    ['requirement' => $requirement] ,
                    function($message) use($user_emails)
                    {
                        $message->from('info@truckjee.com','TruckJee');
                        $message->to($user_emails);
                        $message->Subject('Dear User, new load for your truck posted');
                    });
        Log::info("Queued mail for requirement : ".$requirement['id']);
    }

    /**
     *
     * @param array $user_emails
     */
    public function smsRequirementsToOwner(array $user_emails)
    {

    }
}
