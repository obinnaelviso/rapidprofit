<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\ReferralBonus;
use App\Notifications\DefaultAdmin;
use App\Notifications\InvestmentStart;
use App\Notifications\ReferralBonus as NotificationsReferralBonus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class InvestmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'account_status', 'verified']);
    }

    public function investmentsSelect($name) {
        $user = $this->user();
        $package = Package::where('name', $name)->first();

        if (now()->isWeekend() || now()->day == now()->endOfMonth()->day) {
            $investmentDate = now()->nextWeekday();
        } else {
            $investmentDate = now();
        }

        $investmentStartDate = new Carbon($investmentDate);
        $investmentEndDate = $investmentDate->endOfMonth();
        $duration = $this->investmentDuration($investmentStartDate, $investmentEndDate->day);
    // dd([
    //     'currentDate' => now(),
    //     'investmentStartDate' => $investmentStartDate,
    //     'investmentEndDate' => $investmentEndDate,
    //     'duration' => $duration
    // ]);
        return view('auth.user.investments.investment-select', compact('user', 'package', 'duration', 'investmentStartDate', 'investmentEndDate'));
    }

    public function invest($name, Request $request) {
        $user = $this->user();
        $package = Package::where('name', $name)->first();

        $this->invest_validator($request, $user->wallet->amount, $package->min_amount, $package->max_amount)->validate();

        $percentage = $package->percentage;

        if (now()->isWeekend()) {
            $investmentDate = now()->nextWeekday();
            if ($investmentDate->day == $investmentDate->endOfMonth()->day) {
                $investmentDate = $investmentDate->nextWeekday();
            }
        } else {
            $investmentDate = now();
        }
        $investmentStartDate = new Carbon($investmentDate);
        $investmentEndDate = $investmentDate->endOfMonth();

        $amount = $request->amount;
        $commission = calculateCommission($amount, $package->commissions_percentage);
        // Add to investments
        $investment = $user->investments()->create([
            'package_id' => $package->id,
            'amount' => $amount,
            'commission' => $commission,
            'prev_bal' => $user->wallet->amount,
            'new_bal' => $user->wallet->amount - $amount,
            'start_at' => $investmentStartDate,
            'expiry_date' => $investmentEndDate->subHours(18)->addMicroseconds(1),
            'status_id' => status(config('status.active'))
        ]);
        $duration = $this->investmentDuration($investmentStartDate, $investmentEndDate->day);
        $payout = calculateInvestmentReturn($amount, $percentage, $duration)[1];

        $investment->payout()->create([
            'user_id' => $user->id,
            'amount' => $payout,
            'status_id' => status(config('status.pending'))
        ]);

        $user->wallet->amount -= $amount;
        $user->wallet->commissions += $commission;
        $user->wallet->save();

        // Referral Code
        $referral = ReferralBonus::where('ref_id', $user->id)->where('status_id', status(config('status.pending')))->first();
        if($referral) {
            $general = settings('general');
            $referrer_bon = array_key_exists('referrer_bon', $general) ?$general->referrer_bon:10;
            $referred_bon = array_key_exists('referred_bon', $general) ?$general->referred_bon:5;
            $referral->user->wallet->bonus += $referrer_bon;
            $user->wallet->bonus += $referred_bon;
            $referral->status_id = status(config('status.expired'));
            $referral->amount = $referrer_bon;
            $referral->ref_amount = $referred_bon;
            $referral->user->wallet->save();
            $user->wallet->save();
            $referral->save();

            $referral->user->notify(new NotificationsReferralBonus((int)$referrer_bon));
            $user->notify(new NotificationsReferralBonus((int)$referred_bon));
        }

        $user->notify(new InvestmentStart($investment));
        Notification::route('mail', config('mail.from.address'))
                    ->notify(new DefaultAdmin("New Investment Started",
                                ucfirst($user->first_name)." just started **".ucfirst($investment->package->name)."** investment with **".config('app.currency').$investment->amount."**. Click on the button below for more information: "));


        return redirect()->route('user.investments.manage')->with('success','Congratulations! Your investment is up and running.');
    }

    public function manageInvestments() {
        $user = $this->user();
        $active_investments = $user->investments()->where('status_id', status(config('status.active')))->orderBy('created_at','desc')->get();
        $completed_investments = $user->investments()->where('status_id', status(config('status.completed')))->orderBy('created_at','desc')->get();

        return view('auth.user.investments.manage-investments', compact('user', 'active_investments', 'completed_investments'));
    }

    protected function invest_validator($data, $balance, $min_amount, $max_amount)
    {
    	$validator = Validator::make($data->all(), [
    		'amount' => 'required|numeric|min:'.$min_amount.'|max:'.$max_amount,
    	]);

    	$validator->after(function ($validator) use ($data, $balance) {
		    if ($data->amount > $balance) {
		        $validator->errors()->add('amount', 'Sorry, but you have insufficient balance. Please make a deposit to continue or you choose a smaller investment plan!');
		    }
		});

		return $validator;
    }

    function investmentDuration(Carbon $investmentDate, int $investmentEnd) {
        $duration = 1;
        $startDate = new Carbon($investmentDate);
        while ($startDate->day != $investmentEnd) {
            $duration++;
            $startDate = $startDate->nextWeekday();
        }
        return $duration;
    }

    function investmentsCalculateProfit(Request $request) {
        if($request->amount >= $request->min_amount && $request->amount <= $request->max_amount) {
            $amount = $request->amount;
            $percentage = $request->percentage;
            $profit = ($amount * $percentage/100);

            // Payout
            $duration = $request->duration;
            $payout = $amount + ($profit * $duration);

            return response([
                'profit' => $profit,
                'payout' => $payout,
            ], Response::HTTP_OK);
        } else return response([
            'profit' => 0,
            'payout' => 0,
        ], Response::HTTP_OK);
    }

    function user() {
        return Auth::user();
    }
}
