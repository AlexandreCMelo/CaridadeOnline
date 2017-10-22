<?php

namespace Charis\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DefaultMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $fromAddress;
    public $messageSubject;
    public $messageContent;
    public $fromName;


    /**
     * DefaultMessage constructor.
     * @param $from
     * @param $subject
     * @param $content
     * @param bool $fromName
     */
    public function __construct($from, $subject, $content, $fromName = false)
    {
        $this->fromAddress = $from;
        $this->messageSubject = $subject;
        $this->messageContent = $content;
        $this->fromName = isset($fromName) ? env('MAIL_FROM_NAME') : $fromName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->fromAddress,$this->fromName)->subject($this->messageSubject)->markdown('Email.default_message');
    }
}
