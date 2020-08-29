<?php

namespace App\Models;

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
}
