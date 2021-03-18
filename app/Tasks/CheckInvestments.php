<?php

namespace App\Tasks;

use App\Models\Investment;
use App\Notifications\InvestmentPayout;

class CheckInvestments {
    public function __invoke()
    {
        $pending_investments = Investment::where('status_id', status(config('status.active')))->get();
        if($pending_investments->count() > 0) {
            foreach($pending_investments as $investment) {
                $current_date = now();
                $end_date = $investment->expiry_date;

                if ($end_date->lessThanOrEqualTo($current_date)) {
                    $investment->status_id = status(config('status.completed'));
                    $investment->payout->status_id = status(config('status.completed'));
                    $investment->user->wallet->amount += $investment->payout->amount;
                    $investment->save();
                    $investment->user->wallet->save();
                    $investment->payout->save();

                    $investment->user->notify(new InvestmentPayout($investment));
                }
            }
        }
    }
}
