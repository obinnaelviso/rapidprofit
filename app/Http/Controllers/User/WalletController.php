<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use App\Notifications\DefaultAdmin;
use App\Notifications\DepositReceiptUser;
use App\Notifications\WithdrawRequestUser;
use App\Notifications\WithdrawalCancel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'account_status']);
        $this->middleware('verified')->except('withdrawCancel');
    }

    public function transferBonus() {
        $user = $this->user();
        $general = settings('general');
        $referral_limit = isset($general->referral_limit) ?$general->referral_limit:100;
        if($user->wallet->bonus >= $referral_limit) {
            $bonus = $user->wallet->bonus;
            // Create payment receipt
            $receipt = $user->paymentReceipts()->create([
                'amount' => $bonus,
                'payment_method' => 'bonus-transfer',
                'url' => null,
                'status_id' => status(config('status.completed'))
            ]);
            // Deposit entry
            $user->deposits()->create([
                'amount' => $bonus,
                'prev_bal' => $user->wallet->amount,
                'new_bal' => $user->wallet->amount + $bonus,
                'status_id' => status(config('status.completed')),
                'payment_receipt_id' => $receipt->id
            ]);
            $user->wallet->amount += $bonus;
            $user->wallet->bonus = 0;
            $user->wallet->save();
            session()->flash('success', 'Referral bonus transferred to your main account!');
        }
        return back();
    }

    public function paymentUpload(Request $request) {
        $user = $this->user();

        $general = settings('general');
        $min_dep = isset($general->min_dep) ?$general->min_dep:100;
        $max_dep = isset($general->max_dep) ?$general->max_dep:1000000;

        $this->validate(request(), [
            'payment_method' => 'required',
            'amount' => 'required|numeric|min:'.$min_dep.'|max:'.$max_dep
        ]);
        $user->paymentReceipts()->create([
            'payment_method'=> $request->payment_method,
            'amount' => $request->amount,
            'status_id' => status(config('status.pending'))
        ]);
        $user->notify(new DepositReceiptUser);
        Notification::route('mail', config('mail.from.address'))
                    ->notify(new DefaultAdmin("New Deposit Request",
                    "**".ucfirst($user->first_name).' ('.$user->email.")** payment request of ".config('app.currency').$request->amount." has just being received for confirmation. Click the button below to process request: "));
        session()->flash('warning', 'Your account will be creditted once payment has been confirmed. Thank you!');
        return back();
    }

    public function paymentStatus($status) {
        if ($status == 'success') {
            session()->flash('success', 'Payment completed successfully! Please upload your evidence of payment.');
        } else
            session()->flash('failed', 'Payment not successful! Something went wrong.');
        return back();
    }

    public function withdrawFunds(Request $request) {
        $user = $this->user();
        $balance = $user->wallet->amount;
        $general = settings('general');
        $min_with = isset($general->min_with) ?$general->min_with:100;
        $max_with = isset($general->max_with) ?$general->max_with:1000000;
        $this->validate(request(), [
            'amount' => 'required|numeric|min:'.$min_with.'|max:'.$max_with,
            'withdraw_method' => 'required',
            'bitcoin_address' => 'required'
        ]);

        if($request->amount > $balance) return back()->with('failed','!! Insufficients funds, please try a smaller amount.');

        $withdraw = $user->withdrawals()->create([
            'amount' => $request->amount,
            'prev_bal'=> $user->wallet->amount,
            'new_bal' => $user->wallet->amount - $request->amount,
            'withdraw_method' => $request->withdraw_method,
            'bitcoin_address' => $request->bitcoin_address,
            'status_id' => status(config('status.pending'))
        ]);
        $user->wallet->amount -= $request->amount;
        $user->wallet->save();

        $user->notify(new WithdrawRequestUser($withdraw));
        Notification::route('mail', config('mail.from.address'))
                    ->notify(new DefaultAdmin("New Withdrawal Request",
                    "**".ucfirst($user->first_name).' ('.$user->email.")** just made a new withdrawal request for **".config('app.currency').$request->amount."**. Click the button below to process request: "));

        return back()->with('warning', 'Please wait! Your withdrawal is being processed...');
    }

    public function withdrawCancel(Withdrawal $withdrawal) {
        $user = $withdrawal->user;

        $withdrawal->status_id = status(config('status.inactive'));
        $withdrawal->save();

        $user->wallet->amount += $withdrawal->amount;
        $user->wallet->save();

        $user->notify(new WithdrawalCancel);
        return back()->with('success', 'Withdrawal request cancelled!');
    }

    function user() {
        return Auth::user();
    }
}
