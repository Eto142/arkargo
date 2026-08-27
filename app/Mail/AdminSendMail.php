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
    public $attachmentName;
    public $attachmentMime;
    public $attachmentData;

    public function __construct($subjectLine, $bodyMessage, $attachmentName = null, $attachmentMime = null, $attachmentData = null)
    {
        $this->subjectLine = $subjectLine;
        $this->bodyMessage = $bodyMessage;
        $this->attachmentName = $attachmentName;
        $this->attachmentMime = $attachmentMime;
        $this->attachmentData = $attachmentData;
    }

    public function build()
    {
        $isImage = $this->attachmentMime && str_starts_with($this->attachmentMime, 'image/');

        $mail = $this->subject($this->subjectLine)
                    ->view('emails.admin-send')
                    ->with([
                        'bodyMessage'    => $this->bodyMessage,
                        'attachmentName' => $this->attachmentName,
                        'attachmentMime' => $this->attachmentMime,
                        'attachmentData' => $isImage ? $this->attachmentData : null,
                    ]);

        // Non-image files can't be shown inline, so send them as a real attachment.
        if ($this->attachmentData && $this->attachmentName && ! $isImage) {
            $mail->attachData($this->attachmentData, $this->attachmentName, [
                'mime' => $this->attachmentMime,
            ]);
        }

        return $mail;
    }
}
