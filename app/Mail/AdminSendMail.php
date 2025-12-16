<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectLine;
    public $bodyMessage;

    public function __construct($subjectLine, $bodyMessage)
    {
        $this->subjectLine = $subjectLine;
        $this->bodyMessage = $bodyMessage;
    }

    public function build()
    {
        return $this->subject($this->subjectLine)
                    ->view('emails.admin-send')
                    ->with([
                        'bodyMessage' => $this->bodyMessage
                    ]);
    }
}
