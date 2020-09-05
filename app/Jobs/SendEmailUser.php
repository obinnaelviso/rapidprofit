<?php

namespace App\Jobs;

use App\Mail\EmailUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $subject;
    protected $name;
    protected $user_firstname;
    protected $message;

    public function __construct(string $subject, string $message, string $name, string $user_firstname)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->user_firstname = $user_firstname;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('dreamor47@gmail.com')->send(new EmailUser($this->subject, $this->message, $this->name, $this->user_firstname));
    }
}
