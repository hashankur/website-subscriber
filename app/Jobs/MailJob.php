<?php

namespace App\Jobs;

use App\Mail\SubscribedWebsiteMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email, $title, $message;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $title, $message)
    {
        $this->email = $email;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(
            new SubscribedWebsiteMail($this->title, $this->message)
        );
    }
}
