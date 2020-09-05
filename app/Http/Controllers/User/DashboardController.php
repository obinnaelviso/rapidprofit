<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Package;
use App\Notifications\PasswordChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'account_status','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = $this->user();
        $active_investments = Investment::where('user_id', $user->id)->where('status_id', status(config('status.active')))->get();
        return view('auth.user.home', compact('user', 'active_investments'));
    }

    public function investments()
    {
        $user = $this->user();
        $packages = Package::where('status_id', status(config('status.active')))->get();
        return view('auth.user.investments', compact('user', 'packages'));
    }

    public function deposit() {
        $user = $this->user();

        return view('auth.user.deposit', compact('user'));
    }

    public function withdraw() {
        $user = $this->user();
        $withdrawals = $user->withdrawals()->where('status_id', status(config('status.pending')))->orderBy('created_at', 'desc')->get();

        return view('auth.user.withdraw', compact('user', 'withdrawals'));
    }

    public function profile() {
        $user = $this->user();
        return view('auth.user.profile', compact('user'));
    }

    public function profile_update(Request $request) {
        $user = $this->user();

        $this->validate(request(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'string|max:50',
            'address' => 'string|max:100',
            'phone' => 'string|max:20'
        ]);

        $notif_msg = '';

        if($request->old_password) {
            $this->validate(request(), [
                'old_password' => 'required',
                'password' => 'required|min:8|confirmed'
            ]);

            if($user->password_check($request->old_password)) {
                $user->password = $request->password;
                $user->save();

                $user->notify(new PasswordChanged);
                $notif_msg = ' and password changed.';
            } else {
                return back()->with('failed', 'Incorrect password! Please try again.');
            }
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country
        ]);
        return back()->with('success', 'Profile updated'.$notif_msg.' successfully!');
    }

    function user() {
        return Auth::user();
    }

}
