@extends('layouts.dashboard.main')
@section('title', 'Admin Dashboard')
@section('home-active', 'active')
@section('sidebar')
@include('layouts.sidebar-admin')
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
            <h1 class="m-0">Admin Dashboard</h1>
        </div>
    </div>
</div>




{{-- <div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-6 card-body">
                @if($deposit_requests->count())
                    <h5 class="card-heading">Recent Deposit Requests</h5>
                    <div class="table-responsive border-bottom">

                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Receipt</th>
                                    <th scope="col">Bitcoin Address</th>
                                    <th scope="col">Amount ($)</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deposit_requests->get() as $receipt)
                                    <tr>
                                        <td class="text-uppercase">{{ $receipt->user->first_name.' '.$receipt->user->last_name }}</td>
                                        <td class="text-uppercase">{{ $receipt->payment_method }}</td>
                                        <td>
                                            @if($receipt->url)
                                                <a href="{{ route('admin.manage.users.deposit.download-receipt', $receipt->id) }}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download </a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $receipt->bitcoin_address? :"N/A" }}</td>
                                        <td class="text-success">+{{ config('app.currency').$receipt->amount }}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm" onclick="newDeposit('{{ $receipt->id }}', {{ $receipt->user->id }});">Confirm Deposit</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h5 class="card-text text-success">No Payment Receipts Available</h5>
                @endif
            </div>
            <div class="col-lg-6 card-body">
                @if($withdraw_requests->count())
                    <h5 class="card-heading">Recent Withdraw Requests</h5>
                    <div class="table-responsive border-bottom">

                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Bitcoin Address</th>
                                    <th scope="col">Request Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdraw_requests->get() as $withdrawal)
                                    <tr>
                                        <td class="text-uppercase">{{ $withdrawal->user->first_name.' '.$withdrawal->user->last_name }}</td>
                                        <td class="text-capitalize">{{ $withdrawal->withdraw_method }}</td>
                                        <td>{{ config('app.currency').$withdrawal->amount }}</td>
                                        <td>{{ $withdrawal->bitcoin_address }}</td>
                                        <td>{{ $withdrawal->created_at }}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm" onclick="newWithdrawal('{{ $withdrawal->id }}', {{ $withdrawal->user->id }})">Complete Withdrawal</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h5 class="card-text text-success">No Withdrawal Requests Available</h5>
                @endif
            </div>
        </div>
    </div>
</div> --}}



<div class="container-fluid page__container">

    <div class="row mt-3">
        <div class="col-12">
            <p class="text-dark-gray d-flex align-items-center mt-3">
                <i class="fas fa-tachometer-alt icon-muted mr-2"></i>
                <strong>Statistics</strong>
            </p>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-primary mb-2">Verified Users</div>
                    <div class="text-amount">{{ $verified_users->count() }}</div>
                </div>
                <div><i class="fas fa-users icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-success mb-2">Active Users</div>
                    <div class="text-amount">{{ $active_users->count() }}</div>
                </div>
                <div><i class="fas fa-users icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-danger mb-2">Blocked Users</div>
                    <div class="text-amount">{{ $blocked_users->count() }}</div>
                </div>
                <div><i class="fas fa-users icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Investment Packages</div>
                    <div class="text-amount">{{ $packages->count() }}</div>
                </div>
                <div><i class="fas fa-boxes icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Total Investments</div>
                    <div class="text-amount">{{ $total_investments->count() }}</div>
                </div>
                <div><i class="fas fa-chart-line icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Active Investments</div>
                    <div class="text-amount">{{ $active_investments->count() }}</div>
                </div>
                <div><i class="fas fa-chart-line icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Completed Investments</div>
                    <div class="text-amount">{{ $completed_investments->count() }}</div>
                </div>
                <div><i class="fas fa-chart-line icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Total Payouts</div>
                    <div class="text-amount" id="total-payouts">{{ $total_payouts->sum('amount') }}</div>
                </div>
                <div><i class="fas fa-money-bill-wave icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Withdrawal Requests</div>
                    <div class="text-amount">{{ $withdraw_requests->count() }}</div>
                </div>
                <div><i class="fas fa-hand-holding-usd icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                <div class="flex">
                    <div class="card-header__title text-muted mb-2">Deposit Requests</div>
                    <div class="text-amount">{{ $deposit_requests->count() }}</div>
                </div>
                <div><i class="fas fa-wallet icon-muted icon-40pt ml-2"></i></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('input-js')
<script>
    var total_payouts = "{{ config('app.currency') }}" + numberWithCommas($('#total-payouts').html())

    $('#total-payouts').html(total_payouts)

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
@endsection
