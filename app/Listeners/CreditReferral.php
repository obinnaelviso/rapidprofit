<?php

namespace App\Listeners;

use App\Notifications\ReferralBonus;
use App\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreditReferral implements ShouldQueue
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

        $general = settings('general');
        $referrer_bon = array_key_exists('referrer_bon', $general) ?$general->referrer_bon:100;
        $referred_bon = array_key_exists('referred_bon', $general) ?$general->referred_bon:1000000;

        $ref_code = $event->user->referral_code;
        $event->user->referral_code = generateRandom(6);
        $event->user->save();

        $referrer_bonus = $referrer_bon;
        $referred_bonus = $referred_bon;

        $ref_user = User::where('referral_code', $ref_code)->first();
        if($ref_user) {
            $ref_user->referrerBonus()->create([
                'ref_id' => $event->user->id,
                'referral_code' => $ref_code,
                'amount' => $referrer_bonus,
                'ref_amount' => $referred_bonus,
                'status_id' => status(config('status.pending'))
            ]);

            // $ref_user->notify(new ReferralBonus($referrer_bonus));
            // $event->user->notify(new ReferralBonus($referred_bonus));
        }

    }
}
