<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\PaymentReceipt;
use App\Models\Withdrawal;
use App\Notifications\AccountActive;
use App\Notifications\AccountBlocked;
use App\Notifications\AccountCredited;
use App\Notifications\EmailUpdated;
use App\Notifications\WithdrawalConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $receipts = $reg_user->paymentReceipts()->orderBy('updated_at', 'desc')->get();
        // $deposits = $reg_user->deposits;
        $withdrawals = $reg_user->withdrawals;
        return view('auth.admin.manage-users.view-user', compact('user', 'reg_user', 'investments', 'receipts', 'withdrawals'));
    }

    public function downloadReceipt(PaymentReceipt $receipt) {
        return Storage::download($receipt->url);
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

    public function updateBonus(User $reg_user, Request $request) {
        $this->validate(request(), [
            'bonus' => 'required|numeric'
        ]);
        $reg_user->wallet->bonus = $request->bonus;
        $reg_user->wallet->save();
        return response([
            'bonus' => $reg_user->wallet->bonus,
            'message' => 'User bonus updated successfully!'
        ]);
    }

    public function updateCommission(User $reg_user, Request $request) {
        $this->validate(request(), [
            'commission' => 'required|numeric'
        ]);
        $reg_user->wallet->commissions = $request->commission;
        $reg_user->wallet->save();
        return response([
            'commission' => $reg_user->wallet->commissions,
            'message' => 'User commission updated successfully!'
        ]);
    }

    public function updateEmail(User $reg_user, Request $request) {
        $this->validate(request(), [
            'email' => 'required|email|unique:users'
        ]);
        $old_email = $reg_user->email;
        $reg_user->email = $request->email;
        $reg_user->email_verified_at = null;
        $reg_user->save();

        $reg_user->sendEmailVerificationNotification();

        $reg_user->notify(new EmailUpdated($old_email));

        return response([
            'email' => $reg_user->email,
            'message' => 'User email address updated successfully!'
        ]);
    }

    public function accountStatus(Request $request, User $reg_user) {
        if($reg_user->status_id == status(config('status.active'))) {
            $this->validate(request(), [
                'reason' => 'required'
            ]);

            $reg_user->status_id = status(config('status.inactive'));
            $reg_user->blacklist()->create($request->all());
            $message = "User account disabled successfully!";

            $reg_user->notify(new AccountBlocked($request->reason));
        } else {
            $reg_user->status_id = status(config('status.active'));
            $message = "User account activated successfully!";
            $reg_user->blacklist()->delete();
            $reg_user->notify(new AccountActive);
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

        $deposit = $reg_user->deposits()->create([
            'amount' => $amount,
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

    public function newWithdrawal(Request $request, User $reg_user) {
        $withdrawal = Withdrawal::find($request->withdraw_id);
        $withdrawal->status_id = status(config('status.completed'));
        $withdrawal->save();

        $reg_user->notify(new WithdrawalConfirmed);

        return response([
            'message' => "Withdrawal request completed successfully!"
        ]);
    }

    protected function user() {
        return Auth::user();
    }

}
