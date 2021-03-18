@extends('layouts.dash.main')
@section('title', 'Admin Dashboard')
@section('content')
<div class="row">
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-dark text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Registered Users</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-users fa-3x text-dark"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-dark">{{ $users->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-warning text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Verified Users</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-users fa-3x text-warning"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-warning">{{ $verified_users->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-success text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Active Users</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-users fa-3x text-success"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-success">{{ $active_users->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-danger text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Blocked Users</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-user-times fa-3x text-danger"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-danger">{{ $blocked_users->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-dark text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Investment Packages</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-cogs fa-3x text-dark"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-dark">{{ $packages->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-dark text-light-op">
                <i class="fa fa-fw fa-bar-chart"></i> <strong>Total Investments</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-users fa-3x text-dark"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-dark">{{ $total_investments->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-warning text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Active Investments</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-bar-chart fa-3x text-warning"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-warning">{{ $active_investments->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-success text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Completed Investments</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-bar-chart fa-3x text-success"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-success">{{ $completed_investments->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-dark text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Total Payouts</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-money fa-3x text-dark"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-dark">{{ config('app.currency').$total_payouts->sum('amount') }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-dark text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Withdrawal Requests</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-envelope fa-3x text-dark"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-dark">{{ $withdraw_requests->count() }}</h2>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content themed-background-dark text-light-op">
                <i class="fa fa-fw fa-chevron-right"></i> <strong>Deposit Requests</strong>
            </div>
            <div class="widget-content themed-background-muted text-center">
                <i class="fa fa-paper-plane fa-3x text-dark"></i>
            </div>
            <div class="widget-content text-center">
                <h2 class="widget-heading text-dark">{{ $deposit_requests->count() }}</h2>
            </div>
        </a>
    </div>
</div>
@endsection
