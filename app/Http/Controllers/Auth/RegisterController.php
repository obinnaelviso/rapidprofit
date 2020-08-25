<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
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
            'referral_code' => ['max:100'],
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
        if ($data['phone'] == 1234) {
            $role_id = role(config('roles.admin'));
        }
        $status_id = status(config('status.active'));
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'address' => $data['address'],
            'email' => $data['email'],
            'role_id' => $role_id,
            'status_id' => $status_id,
            'referral_code' => generateRandom(6),
            'password' => $data['password'],
        ]);
        $user->wallet()->create([
            'amount' => config('constants.amount.default'),
            'status_id' => $status_id,
        ]);
        session()->flash('success', 'Registration completed successfully! You can now login to your account.');
        return $user;
    }
}
