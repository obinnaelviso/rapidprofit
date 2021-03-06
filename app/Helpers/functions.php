<?php

use App\Models\Role;
use App\Models\Setting;
use App\Models\Status;

function generateRandom(int $number) {
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNO4444444444444444PQRSTUVWXYZ0123456789abcdefghijklmn00000000000000000opqrstuvwxyzABCDEAALSLDKFHDJFVNEINNIEkskljdjusfisnngsfjsigifguiFGHIJKLMNOPQRSTU7777777777VWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($permitted_chars), 0, $number);
}

function role($role_title) {

    return Role::where('title', $role_title)->first()->id;
}

function status($status_title) {
    return Status::where('title', $status_title)->first()->id;
}

function calculateInvestmentReturn($amount, $percentage, $duration) {
    $profit = ($amount * $percentage/100);

    // Payout
    $no_of_payouts = floor($duration / 7);
    $payout = $amount + ($profit * $no_of_payouts);

    return [$profit, $payout];
}

function settings(string $value) {
    $settings = Setting::where('key', $value)->first();
    return json_decode($settings->value);
}
