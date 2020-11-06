<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReferralBonus extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $bonus;

    public function __construct(int $bonus)
    {
        $this->bonus = $bonus;
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
        return (new MailMessage)->subject("Rapidprofit: Account Credited for Referral Bonus")
                    ->greeting('Hi '.ucfirst($notifiable->first_name).', ')
                    ->line("You have just been credited with **".config('app.currency').$this->bonus.'** for referral.')
                    ->line("Click on the button below to view bonus: ")
                    ->action('Go to Dashboard >>', url(route('user.home')))
                    ->line('Keep inviting more people to earn more!')
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
