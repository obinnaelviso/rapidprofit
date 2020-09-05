<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailUser;
use App\Jobs\SendNewUserRegistered;
use App\Mail\EmailUser;
use App\Mail\NewUserRegistered;
use App\Models\Investment;
use App\Notifications\ReferralBonus;
use App\Models\Package;
use App\Notifications\DefaultAdmin;
use App\Notifications\DepositReceiptUser;
use App\Notifications\InvestmentPayout;
use App\Notifications\InvestmentStart;
use App\Notifications\WelcomeUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class HomeController extends Controller
{
    public function index(Faker $faker) {
        $now = Carbon::now();
        $packages = Package::where('status_id', status(config('status.active')))->get();
        return view('index', compact('faker', 'now', 'packages'));
    }

    public function testEmail() {
        // $name = "Stella";
        // $subject = "You just got a bonus on your account";
        // $user_firstname = "Obinna";
        // $message = "<p>Your account has just being credited with the sum of $200. Please contact our support to make a claim of it. Thanks!</p>";

        $user = User::find(3);
        $investment = Investment::find(1);
        // dispatch(new SendNewUserRegistered($user, config('mail.from.address')));

        // $user->notify(new WelcomeUser);

        // return (new DefaultAdmin("Receipt for Deposit", "A user deposit receipt of payment has just being uploaded for confirmation. Click the button below to process request: "))->toMail($user);
        // return (new InvestmentStart($investment))->toMail($user);
    }
}
