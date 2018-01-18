<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Feedback;

class ContactMessageSended extends Mailable
{
    use Queueable, SerializesModels;

    public $feedback;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(trans('common.email_subject.contact_form'))
            ->view('emails.contact-message-sended')
        ;
    }
}
