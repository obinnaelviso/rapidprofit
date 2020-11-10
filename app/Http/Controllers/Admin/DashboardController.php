<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Package;
use App\Models\PaymentReceipt;
use App\Models\Payout;
use App\Models\Setting;
use App\Models\Withdrawal;
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
        $users = User::users();
        $verified_users = User::verified();
        $active_users = User::active();
        $blocked_users = User::blocked();
        $packages = Package::all();
        $total_investments = Investment::all();
        $active_investments = Investment::active();
        $completed_investments = Investment::completed();
        $total_payouts = Payout::all();
        $withdraw_requests = Withdrawal::pending();
        $deposit_requests = PaymentReceipt::pending();
        // $referral_bonus = ReferralBonus::all();
        return view('auth.admin.home', compact('user', 'users', 'verified_users', 'active_users', 'blocked_users', 'packages',
                                         'total_investments', 'active_investments', 'completed_investments', 'total_payouts',
                                         'withdraw_requests', 'deposit_requests', 'withdraw_requests'));
    }

    public function manageUsers() {
        $user = $this->user();
        $reg_users = User::orderBy('role_id', 'asc')->get();
        return view('auth.admin.manage-users', compact('user', 'reg_users'));
    }

    public function packages() {
        $user = $this->user();
        $packages = Package::orderBy('status_id', 'desc')->get();
        return view('auth.admin.packages', compact('packages', 'user'));
    }

    public function newPackages(Request $request) {
        $user = $this->user();
        $this->validate(request(), [
            'name' => 'required|string',
            'min_amount' => 'required|numeric|min:0',
            'max_amount' => 'required|numeric|min:0',
<<<<<<< HEAD
            'gift_bonus' => 'required|numeric|min:0',
=======
            'commissions_percentage' => 'required|numeric|min:1',
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
            'percentage' => 'required|numeric|min:1',
            'duration' => 'required|numeric|min:7',
        ]);
        $user->packages()->create($request->all()+[
            'status_id' => status(config('status.active'))
        ]);
        return back()->with('success', 'Package created successfully!');
    }

    public function editPackages(Package $package, Request $request) {
        $this->validate(request(), [
            'name' => 'required|string',
            'min_amount' => 'required|numeric|min:0',
            'max_amount' => 'required|numeric|min:0',
<<<<<<< HEAD
            'gift_bonus' => 'required|numeric|min:0',
=======
            'commissions_percentage' => 'required|numeric|min:1',
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
            'percentage' => 'required|numeric|min:1',
            'duration' => 'required|numeric|min:7',
        ]);
        $package->update($request->all());
        return back()->with('success', 'Package updated successfully!');
    }

    public function withdrawals() {
        $user = $this->user();
        $pending_requests = Withdrawal::pending();
        $completed_requests = Withdrawal::completed()->paginate(25);
        return view('auth.admin.withdraw', compact('user', 'pending_requests', 'completed_requests'));
    }

    public function deposits() {
        $user = $this->user();
        $payment_receipts = PaymentReceipt::orderBy('status_id', 'asc');
        return view('auth.admin.deposit', compact('user', 'payment_receipts'));
    }

    public function investments() {
        $user = $this->user();
        $active_investments = Investment::active()->get();
        $completed_investments = Investment::completed()->get();
        return view('auth.admin.investments', compact('user', 'active_investments', 'completed_investments'));
    }

    public function deletePackage(Package $package) {
        if(!$package->investments->count()) {
            $package->delete();
            session()->flash('success', 'Investment package removed successfully!');
        } else session()->flash('failed', 'Oops! Something went wrong.');
        return back();
    }

    public function statusPackages(Package $package) {
        if($package->status_id == status(config('status.active'))) {
            $package->status_id = status(config('status.inactive'));
            $notif_msg = 'Package deactivated successfully!';
        } else {
            $package->status_id = status(config('status.active'));
            $notif_msg = 'Package activated successfully!';
        }
        $package->save();
        return back()->with('success', $notif_msg);
    }

    public function settings() {
        $user = $this->user();
        $gen_settings = Setting::where('key', 'general')->first();
        if (!$gen_settings) {
            $gen_settings = $user->settings()->create(['key' => 'general', 'value' => "[]"]);
        }
        $general = json_decode($gen_settings->value);
        return view('auth.admin.settings.general', compact('user', 'general', 'gen_settings'));
    }

    public function homepageSettings() {
        $user = $this->user();
        $home_settings = Setting::where('key', 'homepage')->first();
        if (!$home_settings) {
            $home_settings = $user->settings()->create(['key' => 'homepage', 'value' => "[]"]);
        }
        $homepage = json_decode($home_settings->value);
        return view('auth.admin.settings.homepage', compact('user', 'homepage', 'home_settings'));
    }

    protected function user() {
        return Auth::user();
    }
}
