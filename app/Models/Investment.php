<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $guarded = [];

    protected $casts = [
        'expiry_date' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function package() {
        return $this->belongsTo(Package::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function payout() {
        return $this->hasOne(Payout::class);
    }

    public static function active() {
        return Investment::where('status_id', status(config('status.active')));
    }

    public static function completed() {
        return Investment::where('status_id', status(config('status.completed')));
    }
}
