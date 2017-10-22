<?php

namespace Charis\Mail;

use Charis\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Charis\Mail\MailSettings;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $user;


    /**
     * Welcome constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans(MailSettings::USER_VIEW_WELCOME_SUBJECT))->markdown(MailSettings::USER_VIEW_WELCOME);
    }
}
