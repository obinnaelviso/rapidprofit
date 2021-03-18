<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'account_status', 'admin']);
    }

    public function editGeneral(Setting $general, Request $request) {
        $this->validate(request(), [
            'min_dep' => 'required|numeric',
            'max_dep' => 'required|numeric',
            'min_with' => 'required|numeric',
            'max_with' => 'required|numeric',
            'referrer_bon' => 'required|numeric',
            'referred_bon' => 'required|numeric',
            'referral_limit' => 'required|numeric'
        ]);
        $general->value = json_encode(array_slice($request->all(), 2));
        $general->save();

        return back()->with('success', 'Settings changed successfully!');
    }

    public function editHomepage(Setting $homepage, Request $request) {
        $this->validate(request(), [
            'active_investors' => 'required|string',
            'active_invest' => 'required|string',
            'average_dep' => 'required|string',
            'average_pay' => 'required|string',
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'telegram' => 'required|string',
            'instagram' => 'required|string'
        ]);
        $homepage->value = json_encode(array_slice($request->all(), 2));
        $homepage->save();

        return back()->with('success', 'Settings changed successfully!');
    }

    protected function user() {
        return Auth::user();
    }
}
