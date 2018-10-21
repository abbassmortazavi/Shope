<?php

namespace App\Listeners\UserRegister;

use App\Events\UsersActivation;
use App\Mail\ActivationAcount;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailNotification
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
     * @param  UsersActivation  $event
     * @return void
     */
    public function handle(UsersActivation $event)
    {
        //dd($event);
        Mail::to($event->user)->send(new ActivationAcount($event->user , $event->activationCode));
    }
}
