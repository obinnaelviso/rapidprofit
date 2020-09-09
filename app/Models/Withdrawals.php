<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $guarded = [];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function pending() {
        return Withdrawal::where('status_id', status(config('status.pending')));
    }

    public static function completed() {
        return Withdrawal::where('status_id', status(config('status.completed')));
    }
}
