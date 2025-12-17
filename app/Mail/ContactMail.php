<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $toUser = false;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $toUser = false)
    {
        $this->data = $data;       // form data
        $this->toUser = $toUser;   // if true, email is sent to the user
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = $this->toUser
            ? 'Thank you for contacting Arkargo'
            : 'New Contact Form Message';

        return $this->subject($subject)
                    ->view('emails.contact_plain')
                    ->with('data', $this->data)
                    ->with('toUser', $this->toUser);
    }
}
