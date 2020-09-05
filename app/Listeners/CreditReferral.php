<?php

namespace App\Listeners;

use App\Notifications\ReferralBonus;
use App\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreditReferral
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Verified  $event
     * @return void
     */
    public function handle(Verified $event)
    {
        $ref_code = $event->user->referral_code;
        $event->user->referral_code = generateRandom(6);
        $event->user->save();

        $referrer_bonus = 50;
        $referred_bonus = 25;

        $ref_user = User::where('referral_code', $ref_code)->first();
        if($ref_user) {
            $ref_user->wallet->bonus += $referrer_bonus;
            $ref_user->wallet->save();

            $event->user->wallet->bonus += $referred_bonus;
            $event->user->wallet->save();

            $ref_user->referrerBonus()->create([
                'ref_id' => $event->user->id,
                'referral_code' => $ref_code,
                'amount' => $referrer_bonus,
                'ref_amount' => $referred_bonus,
                'status_id' => status(config('status.expired'))
            ]);

            $ref_user->notify(new ReferralBonus($referrer_bonus));
            $event->user->notify(new ReferralBonus($referred_bonus));
        }

    }
}
