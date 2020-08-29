<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\PaymentReceipt;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'account_status', 'admin']);
    }

    public function viewUser(User $reg_user) {
        $user = $this->user();
        $investments = $reg_user->investments;
        $receipts = $reg_user->paymentReceipts;
        $deposits = $reg_user->deposits;
        $withdrawals = $reg_user->withdrawals;
        return view('auth.admin.manage-users.view-user', compact('user', 'reg_user', 'investments', 'deposits', 'receipts', 'withdrawals'));
    }

    public function updateBalance(User $reg_user, Request $request) {
        $this->validate(request(), [
            'amount' => 'required|numeric'
        ]);
        $reg_user->wallet->amount = $request->amount;
        $reg_user->wallet->save();
        return response([
            'amount' => $reg_user->wallet->amount,
            'message' => 'User balance updated successfully!'
        ]);
    }

    public function updateEmail(User $reg_user, Request $request) {
        $this->validate(request(), [
            'email' => 'required|email|unique:users'
        ]);
        $reg_user->email = $request->email;
        $reg_user->save();
        return response([
            'email' => $reg_user->email,
            'message' => 'User email address updated successfully!'
        ]);
    }

    public function accountStatus(User $reg_user) {
        if($reg_user->status_id == status(config('status.active'))) {
            $reg_user->status_id = status(config('status.inactive'));
            $message = "User account deactivated successfully!";
        } else {
            $reg_user->status_id = status(config('status.active'));
            $message = "User account activated successfully!";
        }
        $reg_user->save();
        return back()->with('success', $message);
    }

    public function newDeposit(User $reg_user, Request $request) {
        $this->validate(request(), [
            'amount' => 'required|numeric'
        ]);

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

        $reg_user->deposits()->create([
            'amount' => $request->amount,
            'prev_bal' => $reg_user->wallet->amount,
            'new_bal' => $reg_user->wallet->amount + $amount,
            'status_id' => status(config('status.completed')),
            'payment_receipt_id' => $receipt->id
        ]);
        $reg_user->wallet->amount += $amount;
        $reg_user->wallet->save();

        return response([
            'message' => "Deposit successful!"
        ]);
    }

    public function newWithdrawal(Request $request) {
        $withdrawal = Withdrawal::find($request->withdraw_id);
        $withdrawal->status_id = status(config('status.completed'));
        $withdrawal->save();
        return response([
            'message' => "Withdrawal request completed successfully!"
        ]);
    }

    protected function user() {
        return Auth::user();
    }

}
