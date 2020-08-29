<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'account_status']);
    }

    public function paymentUpload(Request $request) {
        $user = $this->user();
        $this->validate(request(), [
            'payment_method' => 'required',
        ]);

    	if($request->hasFile('payment_evidence')) {
            $extension = $request->file('payment_evidence')->extension();
            $file_name = $request->payment_method.'-'.strtolower($user->first_name).'-'.str_replace([' ', ':'],'-', now()).'.'.$extension;
    		$file_url = $request->file('payment_evidence')->storeAs('payment-receipts', $file_name);
            $user->paymentReceipts()->create([
                'url' => $file_url,
                'payment_method'=> $request->payment_method
            ]);
            session()->flash('success', 'File uploaded successfully!');
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

        $this->validate(request(), [
            'amount' => 'required|numeric|min:100|max:'.$balance,
            'withdraw_method' => 'required',
            'bitcoin_address' => 'required'
        ]);

        $user->withdrawals()->create([
            'amount' => $request->amount,
            'prev_bal'=> $user->wallet->amount,
            'new_bal' => $user->wallet->amount - $request->amount,
            'withdraw_method' => $request->withdraw_method,
            'bitcoin_address' => $request->bitcoin_address,
            'status_id' => status(config('status.pending'))
        ]);
        $user->wallet->amount -= $request->amount;
        $user->wallet->save();
        return back()->with('warning', 'Please wait! Your withdrawal is being processed...');
    }

    public function withdrawCancel(Withdrawal $withdrawal) {
        $user = $this->user();

        $withdrawal->status_id = status(config('status.inactive'));
        $withdrawal->save();

        $user->wallet->amount += $withdrawal->amount;
        $user->wallet->save();

        return back()->with('success', 'Withdrawal request cancelled!');
    }

    function user() {
        return Auth::user();
    }
}
