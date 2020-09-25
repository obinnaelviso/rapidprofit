<?php

namespace App;

use App\Model\Blacklist;
use App\Models\Investment;
use App\Models\Payout;
use App\Models\ReferralBonus;
use App\Models\Role;
use App\Models\Wallet;
use App\Models\Status;
use App\Models\Withdrawal;
use App\Models\Deposit;
use App\Models\PaymentReceipt;
use App\Models\Setting;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    // protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'country',
        'referral_code', 'phone', 'email', 'email_verified_at',
        'password', 'address', 'role_id', 'status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wallet() {
        return $this->hasOne(Wallet::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function investments() {
        return $this->hasMany(Investment::class);
    }

    public function paymentReceipts() {
        return $this->hasMany(PaymentReceipt::class)->orderBy('status_id', 'asc');
    }

    public function payouts() {
        return $this->hasMany(Payout::class);
    }

    public function withdrawals() {
        return $this->hasMany(Withdrawal::class);
    }

    public function deposits() {
        return $this->hasMany(Deposit::class);
    }

    public function activeReferrals() {
        return $this->hasMany(ReferralBonus::class)->where('status_id', status(config('status.expired')));
    }

    public function referrerBonus() {
        return $this->hasMany(ReferralBonus::class);
    }

    public function password_check($password) {
        return Hash::check($password, $this->attributes['password']);
    }

    public function settings() {
        return $this->hasMany(Setting::class);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function blacklist() {
        return $this->hasOne(Blacklist::class);
    }

    public function createWallet() {
        $this->wallet()->create([
            'amount' => config('constants.wallet.amount'),
            'bonus' => config('constants.wallet.bonus'),
            'status_id' => status(config('status.active')),
        ]);
    }

    public static function blocked() {
        return User::where('status_id', status(config('status.inactive')));
    }

    public static function active() {
        return User::where('status_id', status(config('status.active')))->where('email_verified_at', '!=', null)->where('role_id', role(config('roles.user')));
    }

    public static function verified() {
        return User::where('email_verified_at', '!=', null)->where('role_id', role(config('roles.user')))->orWhere('email_verified_at', '!=', '');
    }

    public static function users() {
        return User::where('role_id', role(config('roles.user')));
    }
}
