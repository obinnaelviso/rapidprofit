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
        $referral_limit = array_key_exists('referral_limit', $general) ?$general->referral_limit:100;
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
        $min_dep = array_key_exists('min_dep', $general) ?$general->min_dep:100;
        $max_dep = array_key_exists('max_dep', $general) ?$general->max_dep:1000000;

        $this->validate(request(), [
            'payment_method' => 'required',
            'amount' => 'required|numeric|min:'.$min_dep.'|max:'.$max_dep
        ]);

    	if($request->hasFile('payment_evidence')) {
            $extension = $request->file('payment_evidence')->extension();
            $file_name = $request->payment_method.'-'.strtolower($user->first_name).'-'.str_replace([' ', ':'],'-', now()).'.'.$extension;
    		$file_url = $request->file('payment_evidence')->storeAs('payment-receipts', $file_name);
            $user->paymentReceipts()->create([
                'url' => $file_url,
                'payment_method'=> $request->payment_method,
                'amount' => $request->amount,
                'status_id' => status(config('status.pending'))
            ]);
            $user->notify(new DepositReceiptUser);
            Notification::route('mail', config('mail.from.address'))
                        ->notify(new DefaultAdmin("Receipt for Deposit",
                        "**".ucfirst($user->first_name).' ('.$user->email.")** deposit payment receipt has just being uploaded for confirmation. Click the button below to process request: "));
            session()->flash('success', 'Payment receipt uploaded successfully!');
        } else
            session()->flash('failed', 'Something went wrong, please try again!');
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
        $min_with = array_key_exists('min_with', $general) ?$general->min_with:100;
        $max_with = array_key_exists('max_with', $general) ?$general->max_with:1000000;
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
