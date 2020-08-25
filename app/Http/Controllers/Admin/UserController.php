<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
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
        $deposits = $reg_user->paymentReceipts;
        $withdrawals = $reg_user->withdrawals;
        return view('auth.admin.manage-users.view-user', compact('user', 'reg_user', 'investments', 'deposits', 'withdrawals'));
    }

    protected function user() {
        return Auth::user();
    }

}
