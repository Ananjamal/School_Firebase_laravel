<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailDetails;

    public function __construct($emailDetails)
    {
        $this->emailDetails = $emailDetails;
    }

    public function build()
    {
        return $this->view('emails.student_notification')
            ->with('details', $this->emailDetails)
            ->subject($this->emailDetails['subject']);
    }
}
