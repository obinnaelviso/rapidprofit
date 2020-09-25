@extends('layouts.main')
@section('title', 'Your Dashboard - '.config('app.name'))
@section('home-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="page-header">
            <h2 class="pageheader-title">Hello {{ $user->first_name }},</h2>
            <p class="pageheader-text">Welcome back. We missed you!</p>
            <hr>
            @include('layouts.alerts')
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-6 bord-right">
                <div class="card balance-bg">
                    <div class="card-body">
                        <h3 class="balance-heading mb-3"><img src="{{ url('images/icons/balance.svg') }}" style="width: 80px"> Your Balance</h3>
                        <h1 class="balance-heading mb-0" id="wallet-amount">{{ $user->wallet->amount }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <div class="card bonus-bg">
                    <div class="card-body">
                        <h3 class="bonus-heading mb-3"><img src="{{ url('images/icons/bonus.svg') }}" style="width: 80px"> Bonus</h3>
                        <h1 class="bonus-heading mb-0" id="bonus-amount">{{ $user->wallet->bonus }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 mt-3">
        <a href="{{ route('user.deposit') }}" class="btn-dash">
            <img class="statistics-icon" src="{{ url('images/icons/deposit-lg.svg') }}"> Make Deposit</a>
        <a href="{{ route('user.withdraw') }}" class="btn-dash">
            <img class="statistics-icon" src="{{ url('images/icons/withdraw-lg.svg') }}"> Withdraw Funds</a>
        <a href="{{ route('user.investments') }}" class="btn-dash">
            <img class="statistics-icon" src="{{ url('images/icons/investments-lg.svg') }}"> Start an Investment Plan Today!</a>
    </div>
</div>

<hr>

{{-- <div class="row">
    <div class="col-md-12">
        <div class="alert alert-info text-center" role="alert">
          <h4 class="alert-heading">Earn bonus when users register with your referral code: <b id="ref_code" onclick="copyAddress('ref_code')">{{ $user->referral_code }}</b></h4>
          <b>or by sharing link:</b> <h4><a href="javascript:void(0)" class="text-link-purple" id="ref_address" onclick="copyAddress('ref_address')">{{ route('referral', $user->referral_code) }}</a></h4>
          <p class="mb-0">click link to copy <span class="ti-cut"></span></p>
        </div>
    </div>
</div> --}}

<div class="row mb-3">
    <div class="col-md-4">
        <div class="card statistics statistics-left-bg">
            <div class="card-body">
                <img class="statistics-icon" src="{{ url('images/icons/active-investments.svg') }}">
                <div class="statistics-body">
                    <h2 class="statistics-heading">Active<br>Investments</h2>
                    <h2 class="statistics-text" id="active-investments">{{ $active_investments->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card statistics statistics-middle-bg">
            <div class="card-body">
                <img class="statistics-icon" src="{{ url('images/icons/total-investments.svg') }}">
                <div class="statistics-body">
                    <h2 class="statistics-heading">Total<br>Investments</h2>
                    <h2 class="statistics-text" id="total-investments">{{ $user->investments->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    @php
        $referralSum = $user->wallet->bonus;
    @endphp
    <div class="col-md-4">
        <div class="card statistics statistics-right-bg">
            <div class="card-body">
                <img class="statistics-icon" src="{{ url('images/icons/bonus.svg') }}">
                <div class="statistics-body">
                    <h2 class="statistics-heading">Referral<br>Bonus</h2>
                    @if($referralSum >= $referral_limit)
                        <button class="btn btn-success btn-sm" onclick="event.preventDefault();
                        document.getElementById('transfer-bonus').submit();">{{ config('app.currency') }}Transfer Bonus</button>
                    @endif
                    <form id="transfer-bonus" action="{{ route('user.transfer-bonus') }}" method="POST" style="display: none;">
                        @csrf @method('put')
                    </form>
                    <h2 class="statistics-text" id="referral-bonus">{{ $referralSum }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card statistics statistics-left-bg">
            <div class="card-body">
                <img class="statistics-icon" src="{{ url('images/icons/total-amount-invested.svg') }}">
                <div class="statistics-body">
                    <h2 class="statistics-heading">Total Amount<br>Invested</h2>
                    <h2 class="statistics-text" id="total-amount-invested">{{ $user->investments->sum('amount') }}</h2>
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
        <div class="card statistics statistics-middle-bg">
            <div class="card-body">
                <img class="statistics-icon" src="{{ url('images/icons/total-profit-earned.svg') }}">
                <div class="statistics-body">
                    <h2 class="statistics-heading">Total Profit<br>Earned</h2>
                    <h2 class="statistics-text" id="total-profit-earned">{{ $total_profit }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card statistics statistics-right-bg">
            <div class="card-body">
                <img class="statistics-icon" src="{{ url('images/icons/total-payouts.svg') }}">
                <div class="statistics-body">
                    <h2 class="statistics-heading">Total<br>Payouts</h2>
                    <h2 class="statistics-text" id="total-payouts">{{ $total_payouts }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card statistics statistics-left-bg">
            <div class="card-body">
                <img class="statistics-icon" src="{{ url('images/icons/total-pending-payouts.svg') }}">
                <div class="statistics-body">
                    <h2 class="statistics-heading">Total Pending<br>Payouts</h2>
                    <h2 class="statistics-text" id="total-pending-payouts">{{ $user->payouts()->where('status_id', status(config('status.pending')))->sum('amount') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card dash-banner dash-banner-left-bg">
            <div class="card-body">
                <img class="dash-banner-icon" src="{{ url('favicon.png') }}">
                <h3 class="dash-banner-body">Fastest Growing Crypto <br> Investment Company in The World.</h3>
            </div>
        </div>
    </div>
</div>
@endsection
@section('input-js')
<script>
    var active_investments = numberWithCommas($('#active-investments').html())
    var total_investments = numberWithCommas($('#total-investments').html())
    var referral_bonus = "{{ config('app.currency') }}" + numberWithCommas($('#referral-bonus').html())
    var total_amount = "{{ config('app.currency') }}" + numberWithCommas($('#total-amount-invested').html())
    var total_profit = "{{ config('app.currency') }}" + numberWithCommas($('#total-profit-earned').html())
    var total_payouts = "{{ config('app.currency') }}" + numberWithCommas($('#total-payouts').html())
    var total_pending = "{{ config('app.currency') }}" + numberWithCommas($('#total-pending-payouts').html())
    var wallet_amount = "{{ config('app.currency') }}" + numberWithCommas($('#wallet-amount').html())
    var bonus_amount = "{{ config('app.currency') }}" + numberWithCommas($('#bonus-amount').html())

    $('#active-investments').html(active_investments)
    $('#total-investments').html(total_investments)
    $('#referral-bonus').html(referral_bonus)
    $('#total-amount-invested').html(total_amount)
    $('#total-profit-earned').html(total_profit)
    $('#total-payouts').html(total_payouts)
    $('#total-pending-payouts').html(total_pending)
    $('#wallet-amount').html(wallet_amount)
    $('#bonus-amount').html(bonus_amount)

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

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
