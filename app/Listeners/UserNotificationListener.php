<?php

namespace App\Listeners;

use App\Events\UserNotified;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserNotificationListener implements ShouldQueue
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
     * @param  \App\Events\UserNotified  $event
     * @return void
     */
    public function handle(UserNotified $event)
    {        
        $userNotification = $event->userNotification;
        $userNotification->save();
    }
}
