@extends('layouts.dash.main')
@section('content')
<div class="row page-header">
    @include('layouts.alerts')
    <div class="col-sm-6 col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content widget-content-mini text-right clearfix">
                <div class="widget-icon pull-left themed-background-success">
                    <i class="gi gi-money text-light-op"></i>
                </div>
                <h2 class="widget-heading text-success h3">
                    <strong>{{ config('app.currency') }}<span data-toggle="counter" data-to="{{ $user->wallet->amount }}"></span></strong>
                </h2>
                <span class="text-muted">YOUR BALANCE</span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content widget-content-mini text-right clearfix">
                <div class="widget-icon pull-left themed-background-warning">
                    <i class="gi gi-coins text-light-op"></i>
                </div>
                <h2 class="widget-heading text-warning h3">
                    <strong>{{ config('app.currency') }}<span data-toggle="counter" data-to="{{ $user->wallet->bonus }}"></span></strong>
                </h2>
                <span class="text-muted">YOUR BONUS</span>
            </div>
        </a>
    </div>
    <div class="col-md-4 text-center">
        <a href="{{ route('user.deposit') }}" class="btn btn-success btn-block"><i class="gi gi-credit_card"></i> Make Deposit</a>
        <a href="{{ route('user.withdraw') }}" class="btn btn-danger btn-block"><i class="gi gi-bank"></i> Withdraw Deposit</a>
        <a href="{{ route('user.investments') }}" class="btn btn-info btn-block"><i class="hi hi-flash"></i> Start an Investment Plan Today</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-success text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Active Investments</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-hourglass-half fa-3x text-success"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-success">{{ $active_investments->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-warning text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Total Investments</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-line-chart fa-3x text-warning"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-warning">{{ $user->investments->count() }}</h2>
            </div>
        </a>
    </div>
    @php
        $referralSum = $user->wallet->bonus;
    @endphp
    <div class="col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-dark text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Referral Bonus</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-share-alt fa-3x text-dark"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-dark">{{ $referralSum }}</h2>
                @if($referralSum >= $referral_limit)
                    <button class="btn btn-success btn-sm" onclick="event.preventDefault();
                    document.getElementById('transfer-bonus').submit();">{{ config('app.currency') }}Transfer Bonus</button>
                    <form id="transfer-bonus" action="{{ route('user.transfer-bonus') }}" method="POST" style="display: none;">
                        @csrf @method('put')
                    </form>
                @endif
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-success text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Total Amount Invested</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-area-chart fa-3x text-success"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-success">{{ config('app.currency').$user->investments->sum('amount') }}</h2>
            </div>
        </a>
    </div>
    @php
        $completed_status_id = status(config('status.completed'));
        $total_invested = $user->investments->where('status_id', $completed_status_id)->sum('amount');
        $total_payouts = $user->payouts()->where('status_id', $completed_status_id)->sum('amount');
        $total_profit = $total_payouts-$total_invested;
    @endphp
    <div class="col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-warning text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Total Profit Earned</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="gi gi-up_arrow fa-3x text-warning"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-warning">{{ config('app.currency').$user->investments->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-dark text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Total Payouts</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-percent fa-3x text-dark"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-dark">{{ config('app.currency').$total_payouts }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-success text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Total Pending Payouts</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-paper-plane fa-3x text-success"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-success">{{ config('app.currency').$user->payouts()->where('status_id', status(config('status.pending')))->sum('amount') }}</h2>
            </div>
        </a>
    </div>
</div>
@endsection
