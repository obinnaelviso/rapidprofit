<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ReferralBonus extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ref_user() {
        return $this->belongsTo(User::class, 'ref_id', 'id');
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
