<?php

namespace App\Tasks;

use App\Notifications\SummaryForTheMonth;
use App\User;
use Illuminate\Support\Facades\Notification;

class SendSummaryForTheMonth {
    public function __invoke()
    {
        $users = User::verified();
        Notification::send($users, new SummaryForTheMonth);
    }
}
