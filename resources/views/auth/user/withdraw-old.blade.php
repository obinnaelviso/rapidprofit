@extends('layouts.main')
@section('title', 'Withdraw Funds - '.config('app.name'))
@section('withdraw-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <div class="section-block" id="select">
            <h1 class="section-title">Withdraw Funds</h1>
            <p>Make a withdraw request and get credited almost instant (max time of 1hr)</p>
        </div>
        <hr>
    </div>
    <div class="col-md-12">
        @include('layouts.alerts')
        <div class="alert alert-info">
            <i class="fa fa-arrow-right" aria-hidden="true"></i> You can withdraw a minimum of <b>$100</b>.<br>
            <i class="fa fa-arrow-right" aria-hidden="true"></i> All withdrawal requests are processed within 0-60 minutes. <br>
            <i class="fa fa-arrow-right" aria-hidden="true"></i> No amount is charged per withdrawal.
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-12">
        <form method="POST" action="{{ route('user.withdraw.funds') }}">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <h4>Balance:</h4>
                </div>
                <div class="col-md-6">
                    <h1 class="text-right">{{ config('app.currency').$user->wallet->amount }}</h1>
                </div>
            </div><hr>
            @php
                $min_with = array_key_exists('min_with', $general) ?$general->min_with:100;
                $max_with = array_key_exists('max_with', $general) ?$general->max_with:1000000;
            @endphp
            <div class="form-row">
                <div class="col-md-6">
                    <h3>Amount (minimum: {{ config('app.currency').$min_with }})</h3>
                </div>
                <div class="col-md-6 text-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="currency">{{ config('app.currency') }}</span>
                        </div>
                        <input type="number" name="amount" min="{{ $min_with }}" max="{{ $max_with }}"  value="{{ old('amount') }}" class="form-control" id="amount" placeholder="{{ $min_with }}" aria-describedby="currency" required="">
                    </div>
                    <div class="invalid-feedback" id="amountFeedback"></div>
                </div>
            </div><hr>
            <div class="form-row">
                <div class="col-md-6">
                    <h4>Withdrawal Method:</h4>
                </div>
                <div class="col-md-6">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="withdraw_method" value="bitcoin" checked="" class="custom-control-input"><span class="custom-control-label"><img src="/images/payments/bitcoin.png" alt="Withdraw to Bitcoin Address" width="100px"></span>
                    </label>
                </div>
            </div><hr>
            <div class="form-row mb-3">
                <div class="col-md-6">
                    <h4>Enter Bitcoin Address:</h4>
                </div>
                <div class="col-md-6">
                    <input type="text" name="bitcoin_address" min="100" disabled value="{{ old('bitcoin_address') }}" class="form-control" id="bitcoin_address" placeholder="e.g 16oEfPvNr9RL2otUVPrQtpzQPCfgXjk5cr" required="">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block" id="withdraw_button" disabled type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@if($withdrawals->count() > 0)
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h3 class="card-header">Pending Withdrawals</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
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
