<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $old_email;
    public function __construct(string $old_email)
    {
        $this->old_email = $old_email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject(config('app.name').': Email Address Updated!')
                                ->greeting('Hi '.$notifiable->first_name.', ')
                                ->line('Your email address issue has been resolved successfully and your email address has been changed from **'.$this->old_email.'** to **'.$notifiable->email.'**.')
                                ->line("If you were not the one that initiated this action, please don't hesitate to send us a support ticket at ".config('mail.from.address')." or live chat our live agents for an immediate action to be taken.")
                                ->line('Thank you for choosing '.config('app.name').'!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
