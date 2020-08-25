<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
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

    public function index() {
        $user = $this->user();
        return view('auth.admin.home', compact('user'));
    }

    public function manageUsers() {
        $user = $this->user();
        $reg_users = User::where('role_id', role(config('roles.user')))->get();
        return view('auth.admin.manage-users', compact('user', 'reg_users'));
    }

    protected function user() {
        return Auth::user();
    }
}
