<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\PaymentReceipt;
use App\Models\Withdrawal;
use App\Notifications\AccountCredited;
<<<<<<< HEAD
=======
use App\Notifications\CommissionsCleared;
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
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

<<<<<<< HEAD
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
=======

        if ($receipt->payment_type == config('constants.commission')) {
            $deposit = $reg_user->deposits()->create([
                'amount' => $request->amount,
                'prev_bal' => $reg_user->wallet->commissions,
                'new_bal' => $reg_user->wallet->commissions - $amount,
                'status_id' => status(config('status.completed')),
                'payment_receipt_id' => $receipt->id]);

                $reg_user->wallet->commissions -= $amount;
                $reg_user->notify(new CommissionsCleared($deposit));

        } else {
            $deposit = $reg_user->deposits()->create([
                'amount' => $request->amount,
                'prev_bal' => $reg_user->wallet->amount,
                'new_bal' => $reg_user->wallet->amount + $amount,
                'status_id' => status(config('status.completed')),
                'payment_receipt_id' => $receipt->id]);

            $reg_user->wallet->amount += $amount;
            $reg_user->notify(new AccountCredited($deposit));

        }

        $reg_user->wallet->save();

>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc

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

    public function cancelInvestment(Investment $investment) {
        $investment->user->wallet->amount += $investment->amount;
        $investment->user->wallet->save();
        $investment->payout()->delete();
        $investment->delete();
        return back()->with('success', 'Investment cancelled successfully!');
    }
}
