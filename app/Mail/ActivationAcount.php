<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationAcount extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $activationCode;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param $activationCode
     */
    public function __construct(User $user , $activationCode)
    {
        $this->user = $user;
        $this->activationCode = $activationCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('لینک فعال سازی')
            ->markdown('emails.activeUser');
    }
}
