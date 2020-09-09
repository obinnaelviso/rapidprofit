<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentReceipt;
use App\Models\Withdrawal;
use App\Notifications\AccountCredited;
use App\Notifications\WithdrawalConfirmed;
use App\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'account_status', 'admin']);
    }

    public function newDeposit(Request $request) {
        $this->validate(request(), [
            'amount' => 'required|numeric'
        ]);

        $reg_user = User::find($request->reg_user_id);

        $amount = $request->amount;
        if($request->receipt_id) {
            $receipt = PaymentReceipt::find($request->receipt_id);
            $receipt->status_id = status(config('status.completed'));
            $receipt->save();
        }
        else {
            $receipt = $reg_user->paymentReceipts()->create([
                'amount' => $amount,
                'payment_method' => 'direct',
                'url' => null,
                'status_id' => status(config('status.completed'))
            ]);
        }

        $deposit = $reg_user->deposits()->create([
            'amount' => $request->amount,
            'prev_bal' => $reg_user->wallet->amount,
            'new_bal' => $reg_user->wallet->amount + $amount,
            'status_id' => status(config('status.completed')),
            'payment_receipt_id' => $receipt->id
        ]);
        $reg_user->wallet->amount += $amount;
        $reg_user->wallet->save();

        $reg_user->notify(new AccountCredited($deposit));

        return response([
            'message' => "Deposit successful!"
        ]);
    }

    public function newWithdrawal(Request $request) {
        $withdrawal = Withdrawal::find($request->withdraw_id);

        $reg_user = User::find($request->reg_user_id);

        $withdrawal->status_id = status(config('status.completed'));
        $withdrawal->save();

        $reg_user->notify(new WithdrawalConfirmed);

        return response([
            'message' => "Withdrawal request completed successfully!"
        ]);
    }
}
