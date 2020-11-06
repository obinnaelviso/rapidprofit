<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mail_subject;
    public $name;
    public $user_firstname;
    public $message;

    public function __construct(string $subject, string $message, string $name, string $user_firstname)
    {
        $this->mail_subject = $subject;
        $this->name = $name;
        $this->user_firstname = $user_firstname;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('RapidProfit Support: '.$this->mail_subject)
                    ->markdown('emails.email-user');
    }
}
