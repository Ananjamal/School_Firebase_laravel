<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Kreait\Firebase\Contract\Database;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailToAllJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $classes;

    /**
     * Create a new job instance.
     *
     * @param array $classes
     */
    public function __construct(array $classes)
    {
        $this->classes = $classes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Database $database)
    {
        // dd(['classes' => $this->classes]);
        foreach ($this->classes as $className) {
            $students = $database->getReference($className)->getValue();

            if ($students) {
                $chunks = array_chunk($students, 10);

                foreach ($chunks as $chunk) {
                    foreach ($chunk as $id => $student) {
                        $emailDetails = [
                            'email' => $student['email'],
                            'subject' => 'School Notification',
                            'title' => 'Dear ' . $student['name'],
                            'message' => 'This is a bulk notification for all students.',
                        ];

                        Mail::raw($emailDetails['message'], function ($message) use ($emailDetails) {
                            $message->to($emailDetails['email'])
                                ->subject($emailDetails['subject']);
                        });
                    }
                }
            }
        }
    }
}
