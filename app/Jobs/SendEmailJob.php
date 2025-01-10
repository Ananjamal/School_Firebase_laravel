<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentNotificationMail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emailDetails;

    public function __construct($emailDetails)
    {

        $this->emailDetails = $emailDetails;
    }

    public function handle()
{
    
    try {
        
        Mail::to($this->emailDetails['email'])->send(new StudentNotificationMail($this->emailDetails));
    } catch (\Exception $e) {
        dd('Failed to send email: ' . $e->getMessage());
    }
}

    
}
