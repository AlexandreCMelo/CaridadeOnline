<?php

namespace Charis\Mail\System;

use Charis\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Charis\Mail\MailSettings;

class RecoverPass extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     *
     * @var User
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
        return $this->from(MailSettings::SYSTEM_TEAM_MAIL)
            ->markdown(MailSettings::SYSTEM_VIEW_RECOVER_PASS_VIEW,
                [
                    MailSettings::USER_PLACEHOLDER_NAME => $this->user->name,
                    MailSettings::USER_MAIL_RECOVER_PASS_HASH => '',
                ]);
    }
}