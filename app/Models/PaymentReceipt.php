<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PaymentReceipt extends Model
{
    protected $guarded = [];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function deposit() {
        return $this->hasOne(Deposit::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function pending() {
        return PaymentReceipt::where('status_id', status(config('status.pending')));
    }
}
