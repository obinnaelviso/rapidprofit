<?php

namespace App\Notifications;

use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawRequestUser extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $withdraw;

    public function __construct(Withdrawal $withdraw)
    {
        $this->withdraw = $withdraw;
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
        return (new MailMessage)->subject(config('app.name').': Your Withdraw Request is being Processed.')
                    ->greeting('Hi '.$notifiable->first_name.', ')
                    ->line('Your request to withdraw **'.config('app.currency').$this->withdraw->amount.'** is being processed and you will notified as soon as it is confirmed.')
                    ->action('Go to Dashboard >>', url(route('user.home')))
                    ->line("If after 1 hour your withdrawal request has not yet been processed, please do well to send us a support ticket at **".config('mail.from.address')."** or live chat with our customer care agents to rectify this issue.")
                    ->line("If you've not yet upgraded your account to activate withdrawal, know that you'll be notified by our admin at ".config('app.name')." to do so.")
                    ->line('Thank you for choosing '.config('app.name').'.');
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
