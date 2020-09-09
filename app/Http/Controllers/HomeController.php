<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailUser;
use App\Jobs\SendNewUserRegistered;
use App\Mail\EmailUser;
use App\Mail\NewUserRegistered;
use App\Models\Investment;
use App\Models\MailingList;
use App\Notifications\ReferralBonus;
use App\Models\Package;
use App\Models\Setting;
use App\Notifications\Contact;
use App\Notifications\ContactCallback;
use App\Notifications\DefaultAdmin;
use App\Notifications\DepositReceiptUser;
use App\Notifications\InvestmentPayout;
use App\Notifications\InvestmentStart;
use App\Notifications\WelcomeUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index(Faker $faker) {
        $now = Carbon::now();
        $packages = Package::where('status_id', status(config('status.active')))->get();
        $homepage = settings('homepage');
        return view('index', compact('faker', 'now', 'packages', 'homepage'));
    }

    public function contactUs() {
        return view('contact');
    }

    public function contact(Request $request) {
        $this->validate(request(), [
            'subject' => 'required',
            'message' => 'required',
            'email' => 'required',
            'name' => 'required'
        ]);

        Notification::route('mail', config('mail.from.address'))->notify(new Contact($request->all()));
        Notification::route('mail', $request->email)->notify(new ContactCallback($request->name));
        $mailing_list = MailingList::where('email', $request->email)->first();
        if(!$mailing_list) {
            $mailing_list = MailingList::create($request->all());
        }
        $mailing_list->mailings()->create($request->all());
        return back()->with('success', "We've received your message, and we'll kindly get back to you shortly!");
    }



    public function facebook() {
        $settings = settings('homepage');
        return redirect($settings->facebook);
    }

    public function twitter() {
        $settings = settings('homepage');
        return redirect($settings->twitter);
    }

    public function instagram() {
        $settings = settings('homepage');
        return redirect($settings->instagram);
    }

    public function telegram() {
        $settings = settings('homepage');
        return redirect($settings->telegram);
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
