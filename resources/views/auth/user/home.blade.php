@extends('layouts.main')
@section('title', 'Your Dashboard - '.config('app.name'))
@section('home-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Home</h2>
            {{-- <p class="pageheader-text">Get to manage all your wallets in one place</p> --}}
            <hr>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-3 col-xs-6">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">YOUR BALANCE</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ config('app.currency').$user->wallet->amount }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">BONUS</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ config('app.currency').$user->wallet->bonus }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <a href="{{ route('user.deposit') }}" class="btn btn-danger btn-block">Make Deposit</a>
        <a href="{{ route('user.withdraw') }}" class="btn btn-success btn-block">Withdraw Funds</a>
        <a href="{{ route('user.investments') }}" class="btn btn-primary btn-block">Start an Investment Plan Today!</a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info text-center" role="alert">
          <h4 class="alert-heading">Earn bonus when users register with your referral code: <b id="ref_code" onclick="copyAddress('ref_code')">{{ $user->referral_code }}</b></h4>
          <b>or by sharing link:</b> <h4><a href="javascript:void(0)" id="ref_address" onclick="copyAddress('ref_address')">{{ route('referral', $user->referral_code) }}</a></h4>
          <p class="mb-0">click link to copy <span class="ti-cut"></span></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Statistics</h2>
            {{-- <p class="pageheader-text">Get to manage all your wallets in one place</p> --}}
            <hr>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <div class="card border-3 border-top border-top-warning">
            <div class="card-body text-center">
                <h5 class="text-muted">Active Investments</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $active_investments->count() }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-3 border-top border-top-warning">
            <div class="card-body text-center">
                <h5 class="text-muted">Total Investments</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $user->investments->count() }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-3 border-top border-top-warning">
            <div class="card-body text-center">
                <h5 class="text-muted">Referral Bonus</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ config('app.currency').$user->referrerBonus->sum('amount') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-3 border-top border-top-warning">
            <div class="card-body text-center">
                <h5 class="text-muted">Total Amount Invested</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ config('app.currency').$user->investments->sum('amount') }}</h1>
                </div>
            </div>
        </div>
    </div>
    @php
        $completed_status_id = status(config('status.completed'));
        $total_invested = $user->investments->where('status_id', $completed_status_id)->sum('amount');
        $total_payouts = $user->payouts()->where('status_id', $completed_status_id)->sum('amount');
        $total_profit = $total_payouts-$total_invested;
    @endphp
    <div class="col-md-4">
        <div class="card border-3 border-top border-top-warning">
            <div class="card-body text-center">
                <h5 class="text-muted">Total Profit Earned</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ config('app.currency').$total_profit }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-3 border-top border-top-warning">
            <div class="card-body text-center">
                <h5 class="text-muted">Total Payouts</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ config('app.currency').$total_payouts }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-3 border-top border-top-warning">
            <div class="card-body text-center">
                <h5 class="text-muted">Total Pending Payouts</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ config('app.currency').$user->payouts()->where('status_id', status(config('status.pending')))->sum('amount') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('input-js')
<script>
    function copyAddress(id) {
    /* Get the text field */
    var copyText = document.getElementById(id);

    /* Select the text field */
    selectText(id)
    // copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Text copied to clipboard!");
}

function selectText(containerid) {
    if (document.selection) { // IE
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select();
    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
    }
}
</script>
@endsection
