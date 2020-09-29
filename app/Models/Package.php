<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function investments() {
        return $this->hasMany(Investment::class);
    }
}
