@extends('layouts.dashboard.main')
@section('title', 'My Dashboard')
@section('home-active', 'active')
@section('sidebar')
@include('layouts.sidebar-user')
@endsection

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav> --}}
            <h1 class="m-0">Dashboard</h1>
        </div>
    </div>
</div>




<div class="container-fluid page__container">

    {{-- <div class="alert alert-soft-info d-flex align-items-center card-margin" role="alert">
        <i class="material-icons mr-3">error</i>
        <div class="text-body"><strong>You can also earn by  inviting people using your referral link:</strong> <a href="javascript::void(0)" id="ref_code" onclick="copyAddress('ref_code')">{{ route('referral', $user->referral_code ?: 'ABCDEFG12') }}</a><small> ** click to copy link</small></div>
    </div> --}}

    <div class="row card-group-row">
        <div class="col-lg-6 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Monthly Balance ({{ now()->monthName }})</div>
                    <div class="text-amount">{{ config('app.currency').$user->wallet->amount }}</div>
                </div>
                <div><i class="material-icons icon-muted icon-40pt ml-3">monetization_on</i></div>
            </div>
        </div>
        {{-- <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Commissions</div>
                    <div class="text-amount">{{ config('app.currency').$user->wallet->commissions }}</div>
                </div>
                <div><i class="fas fa-piggy-bank icon-muted icon-40pt ml-3"></i></div>
            </div>
        </div> --}}
        <div class="col-lg-6 col-md-12">
            <a href="{{ route('user.deposit') }}" class="btn btn-block btn-outline-danger"><i class="fas fa-wallet icon-20pt mr-2"></i> Make a Deposit</a>
            <a href="{{ route('user.withdraw') }}" class="btn btn-block btn-outline-success"><i class="fas fa-hand-holding-usd icon-20pt mr-2"></i>Withdraw Funds</a>
            <a href="{{ route('user.investments') }}" class="btn btn-block bg-lg btn-primary"><i class="fas fa-chart-line icon-20pt mr-2"></i>Start an Investment</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <p class="text-dark-gray d-flex align-items-center mt-3">
                <i class="fas fa-tachometer-alt icon-muted mr-2"></i>
                <strong>User Statistics</strong>
            </p>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Total Investments</div>
                    <div class="text-amount">{{ $user->investments->count() }}</div>
                </div>
                <div><i class="fas fa-chart-line icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        @php
            $referralSum = $user->wallet->bonus;
        @endphp
        {{-- <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Referral Bonus</div>
                    <div class="text-amount">{{ config('app.currency').$referralSum }}</div>
                    @if($referralSum >= $referral_limit)
                        <button type="button" class="btn btn-block btn-success btn-sm mt-3" onclick="event.preventDefault();
                        document.getElementById('transfer-bonus').submit();"><i class="fas fa-coins icon-20pt mr-2"></i>Transfer Bonus</button>
                        <form id="transfer-bonus" action="{{ route('user.transfer-bonus') }}" method="POST" style="display: none;">
                            @csrf @method('put')
                        </form>
                    @endif
                </div>
                <div><i class="fas fa-coins icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div> --}}
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Total Amount Invested</div>
                    <div class="text-amount">{{ config('app.currency').$user->investments->sum('amount') }}</div>
                </div>
                <div><i class="fas fa-dollar-sign icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        @php
            $completed_status_id = status(config('status.completed'));
            $total_invested = $user->investments->where('status_id', $completed_status_id)->sum('amount');
            $total_payouts = $user->payouts()->where('status_id', $completed_status_id)->sum('amount');
            $total_profit = $total_payouts-$total_invested;
        @endphp
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Total Profit Earned</div>
                    <div class="text-amount">{{ config('app.currency').$total_profit }}</div>
                </div>
                <div><i class="fas fa-money-bill-wave icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Total Payouts</div>
                    <div class="text-amount">{{ config('app.currency').$total_payouts }}</div>
                </div>
                <div><i class="material-icons icon-muted icon-40pt ml-3">trending_up</i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Total Pending Payouts</div>
                    <div class="text-amount">{{ config('app.currency').$user->payouts()->where('status_id', status(config('status.pending')))->sum('amount') }}</div>
                </div>
                <div><i class="material-icons icon-muted icon-40pt ml-3">update</i></div>
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
