<?php

namespace App;

use App\Models\Investment;
use App\Models\Payout;
use App\Models\ReferralBonus;
use App\Models\Role;
use App\Models\Wallet;
use App\Models\Status;
use App\Models\Withdrawal;
use App\Models\Deposit;
use App\Models\PaymentReceipt;
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

    public function referrerBonus() {
        return $this->hasMany(ReferralBonus::class);
    }

    public function referredBonus() {
        return $this->hasOne(ReferralBonus::class, 'ref_id');
    }

    public function password_check($password) {
        return Hash::check($password, $this->attributes['password']);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function createWallet() {
        $this->wallet()->create([
            'amount' => config('constants.wallet.amount'),
            'bonus' => config('constants.wallet.bonus'),
            'status_id' => status(config('status.active')),
        ]);
    }
}
