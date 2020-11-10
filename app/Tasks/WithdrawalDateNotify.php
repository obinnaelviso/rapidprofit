<?php

namespace App\Tasks;

use App\Notifications\WithdrawalDay;
use App\User;
use Illuminate\Support\Facades\Notification;

class WithdrawalDateNotify {
    public function __invoke()
    {
        $users = User::verified();
        Notification::send($users, new WithdrawalDay);
    }
}
