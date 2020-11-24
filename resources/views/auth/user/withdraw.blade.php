@extends('layouts.dashboard.main')
@section('title', 'Withdraw Funds')
@section('withdraw-active', 'active')
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
            <h1 class="m-0">Withdraw Funds</h1>
        </div>
    </div>
</div>



<div class="container-fluid page__container">
    <div class="alert alert-soft-info d-flex align-items-center card-margin" role="alert">
        <i class="material-icons mr-3">error</i>
        <div class="text-body">
            <i class="fas fa-arrow-right mr-3" aria-hidden="true"></i> You can withdraw a minimum of <b>$100</b>.<br>
            <i class="fas fa-arrow-right mr-3" aria-hidden="true"></i> All withdrawal requests are processed within 0-60 minutes. <br>
            <i class="fas fa-arrow-right mr-3" aria-hidden="true"></i> No amount is charged per withdrawal.<br>
            <i class="fas fa-arrow-right mr-3" aria-hidden="true"></i> You have to clear your pending commissions before you can withdraw your funds
        </div>
    </div>
    @if($user->wallet->commissions > 0)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            <h4 class="text-warning">PENDING COMMISSIONS: {{ config('app.currency').$user->wallet->commissions }} <a href="{{ route('user.deposit', ['commissions' => true]) }}"><< CLEAR COMMISSIONS >></a></h4></strong>
        </div>
    @else
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            <h4 class="text-success">YOU HAVE NO PENDING COMMISSIONS, YOU CAN NOW PROCEED TO WITHDRAW YOUR FUNDS AT THE END OF THE MONTH. THANK YOU FOR CHOOSING {{ strtoupper(config('app.name')) }}!!!</h4></strong>
        </div>
    @endif

    <script>
      $(".alert").alert();
    </script>
    @include('layouts.alerts')
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color text-uppercase text-danger">Note that all funds are processed within an hour. Thanks!!!</strong></p>
                <p class="text-muted mb-0">Fill in the form to process withdrawal</p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <form method="POST" action="{{ route('user.withdraw.funds') }}">
                    @csrf
                    @php
                        $min_with = array_key_exists('min_with', $general) ?$general->min_with:100;
                        $max_with = array_key_exists('max_with', $general) ?$general->max_with:1000000;
                    @endphp
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="amount">Amount (minimum: {{ config('app.currency').$min_with }})</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="currency">{{ config('app.currency') }}</span>
                                </div>
                                <input type="number" name="amount" min="{{ $min_with }}" max="{{ $max_with }}"  value="{{ old('amount') }}" class="form-control" id="amount" placeholder="{{ $min_with }}" aria-describedby="currency" required="">
                            </div>
                            <div class="invalid-feedback" id="amountFeedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="withdraw_method">SELECT YOUR WITHDRAWAL METHOD:</label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="withdraw_method" value="bitcoin" checked="" class="custom-control-input"><span class="custom-control-label"><img src="/images/payments/bitcoin.png" alt="Withdraw to Bitcoin Address" width="100px"></span>
                            </label>
                        </div>
                        <div class="col-md-9">
                            <label for="bitcoin_address">Enter Bitcoin Address:</label>
                            <input type="text" name="bitcoin_address" min="100" disabled value="{{ old('bitcoin_address') }}" class="form-control" id="bitcoin_address" placeholder="e.g 16oEfPvNr9RL2otUVPrQtpzQPCfgXjk5cr" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-block" id="withdraw_button" disabled type="submit"><i class="fas fa-hand-holding-usd mr-2"></i> Withdraw</button>
                        </div>
                    </div>
                    {{-- @if(now()->day == now()->daysInMonth)
                        <div class="form-row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" id="withdraw_button" disabled type="submit"><i class="fas fa-hand-holding-usd mr-2"></i> Withdraw</button>
                            </div>
                        </div>
                    @elseif($user->wallet->commissions > 0)
                        <div class="alert alert-warning" role="alert">
                            <strong>Please clear your commissions to commence withdrawal. <a href="{{ route('user.deposit', ['commissions' => true]) }}">Click Here</a> to make a clear your commissions. Thanks!</strong>
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            <strong>Please wait till the end of the month to commence withdrawal. Thanks!</strong>
                        </div>
                    @endif --}}
                </form>
            </div>
        </div>
    </div>
</div>
@if($withdrawals->count() > 0)
<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters">

            <div class="col-lg-12 card-body">
                <h3 class="card-header">Active Investments</h3>
                <div class="table-responsive border-bottom">

                    <table class="table mb-0 thead-border-top-0">
                        <thead>
                            <tr>
                                @php $i = 1; @endphp
                                <th scope="col">#</th>
                                <th scope="col">Withdraw Method</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Bitcoin Address</th>
                                <th scope="col">Withdrawal Status</th>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($withdrawals as $withdrawal)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td class="text-capitalize">{{ $withdrawal->withdraw_method }}</td>
                                    <td>{{ config('app.currency').$withdrawal->amount }}</td>
                                    <td>{{ $withdrawal->bitcoin_address }}</td>
                                    <td><div class="badge badge-warning">{{ $withdrawal->status->title }}</div></td>
                                    <td>{{ $withdrawal->created_at }}</td>
                                    <td>
                                        <a class="btn btn-danger" href="#" onclick="event.preventDefault();
                                        document.getElementById('cancel-withdrawal-form').submit();">Cancel</a>
                                        <form id="cancel-withdrawal-form" action="{{ route('user.withdraw.cancel', $withdrawal->id) }}" method="POST" style="display: none;">
                                            @csrf @method('put')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('input-js')
<script>
    computeAmount()

    $('#amount').on('input', computeAmount)

    function computeAmount() {
        var amount = $('#amount').val()
        var min_amount = {{ $min_with }}
        var max_amount = {{ $max_with }}
        var balance = {{ $user->wallet->amount }}
        var currency = "{{ config('app.currency') }}"
        if(amount >= min_amount && amount <= balance && amount <= max_amount) {
            $('#withdraw_button').prop('disabled', false)
            $('#bitcoin_address').prop('disabled', false)
            $('#amountFeedback').hide()
        } else {
            $('#withdraw_button').prop('disabled', true)
            $('#bitcoin_address').prop('disabled', true)
            if (amount < min_amount)
                $('#amountFeedback').html('!! Amount must be greater than '+ currency + min_amount)
            else if(amount > max_amount)
                $('#amountFeedback').html('!! Maximum amount you can withdraw at a time is '+ currency + max_amount)
            else
                $('#amountFeedback').html('!! Insufficient funds. Please input a smaller amount.')
            $('#amountFeedback').show()
        }
    }
</script>
@endsection
