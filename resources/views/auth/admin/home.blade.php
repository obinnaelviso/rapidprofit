@extends('layouts.main')
@section('title', 'My Dashboard - '.' Admin '.config('app.name'))
@section('home-active', 'active')
@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h2>Dashboard Overview</h2>
    </div>
</div>

{{-- <div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h3 class="pageheader-title text-muted">Recent Activities</h3>
            <p class="pageheader-text">Get to manage all your wallets in one place</p>
        </div>
    </div>
</div> --}}

{{-- <div class="row mb-3">
    <div class="col-md-6 mb-3" id="deposit-table">
        @if($deposit_requests->count())
            <div class="card manage-investments">
                <div class="card-body">
                    <h4 class="card-header">New Payment Receipts</h4>
                    <div>
                        <table class="table table-borderless table-inverse table-responsive">
                            <thead class="thead-inverse">
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
                                                <a href="{{ route('admin.manage.users.deposit.download-receipt', $receipt->id) }}" class="btn auth-button"><i class="fa fa-download" aria-hidden="true"></i> Download </a>
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
                </div>
            </div>
        @else
            <div class="card manage-investments">
              <div class="card-body">
                <h4 class="card-text text-success">No Payment Receipts Available</h4>
              </div>
            </div>
        @endif
    </div>
    <div class="col-md-6 mb-3" id="withdrawal-table">
        @if($withdraw_requests->count())
            <div class="card manage-investments">
                <div class="card-body">
                    <h4 class="card-title">New Withdrawal Receipt</h4>
                    <div>
                        <table class="table table-borderless table-inverse table-responsive">
                            <thead class="thead-inverse">
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
                </div>
            </div>
        @else
            <div class="card manage-investments">
              <div class="card-body">
                <h4 class="card-text text-success">No Withdrawal Requests Available</h4>
              </div>
            </div>
        @endif
    </div>
</div> --}}

<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h3 class="pageheader-title text-muted">Statistics</h3>
            {{-- <p class="pageheader-text">Get to manage all your wallets in one place</p> --}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Registered Users</h5>
                <h2 class="statistics-text mt-0">{{ $users->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Verified Users</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $verified_users->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Active Users</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1 text-success">{{ $active_users->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Blocked Users</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1 text-danger">{{ $blocked_users->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Investment Packages</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $packages->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Total Investments</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $total_investments->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Active Investments</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $active_investments->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Completed Investments</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1 text-success">{{ $completed_investments->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Total Payouts</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1" id="total-payouts">{{ $total_payouts->sum('amount') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Withdrawal Requests</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $withdraw_requests->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 mb-3">
        <div class="card statistics statistics-left-bg">
            <div class="card-body text-center">
                <h5 class="statistics-heading">Deposit Requests</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $deposit_requests->count() }}</h2>
                </div>
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

    function newDeposit(receipt_id = 0, user_id) {
        var amount = prompt('Enter New Deposit', '')
        if(amount != null && amount !="") {
            $.ajax({
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "amount": amount,
                "receipt_id": receipt_id,
                    "reg_user_id": user_id
                },
                url: "{{ route('admin.deposit') }}",
                success: function(response){
                    $("#deposit-table").fadeOut(200, function() {
                            // form.html($response).fadeIn().delay(2000);
                            $("#deposit-table").hide().load(location.href + " #deposit-table").fadeIn().delay(200);
                    }).hide()
                alert(response.message)
                }
            });
        }
    }

    function newWithdrawal(withdraw_id, user_id) {
        $.ajax({
            type: "PUT",
            data: {
                "_token": "{{ csrf_token() }}",
                "withdraw_id": withdraw_id,
                "reg_user_id": user_id
            },
            url: "{{ route('admin.withdraw') }}",
            success: function(response){
                $("#withdrawal-table").fadeOut(200, function() {
                        // form.html($response).fadeIn().delay(2000);
                        $("#withdrawal-table").hide().load(location.href + " #withdraw-table").fadeIn().delay(200);
                }).hide()
            alert(response.message)
            }
        });
    }
</script>
@endsection
