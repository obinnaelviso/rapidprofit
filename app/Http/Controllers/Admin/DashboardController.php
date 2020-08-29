<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
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
            'gift_bonus' => 'required|numeric|min:0',
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
            'gift_bonus' => 'required|numeric|min:0',
            'percentage' => 'required|numeric|min:1',
            'duration' => 'required|numeric|min:7',
        ]);
        $package->update($request->all());
        return back()->with('success', 'Package updated successfully!');
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

    protected function user() {
        return Auth::user();
    }
}
