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
            <h3 class="section-title"><img src="/images/icons/withdraw-big.svg" class="mr-2" alt="withdraw" width="25"> Withdraw Funds</h3>
            <p class="text-muted">Make a withdraw request and get creditted almost instant (max time of 1hr)</p>
        </div>
        <hr>
    </div>
    @php
        $min_with = array_key_exists('min_with', $general) ?$general->min_with:100;
        $max_with = array_key_exists('max_with', $general) ?$general->max_with:1000000;
    @endphp
    <div class="col-md-12">
        @include('layouts.alerts')
        <div class="alert alert-warning withdraw-alert">
            <i class="fa fa-arrow-right" aria-hidden="true"></i> You can withdraw a minimum of <b>{{ config('app.currency').$min_with }}</b>
            <i class="fa fa-arrow-right" aria-hidden="true"></i> All withdrawal requests are processed within 0-60 minutes.
            <i class="fa fa-arrow-right" aria-hidden="true"></i> No amount is charged per withdrawal.
        </div>
    </div>
</div><hr>
<div class="row">
    <div class="col-md-4 bord-right">
        <div class="card balance-bg">
            <div class="card-body">
                <h3 class="balance-heading mb-3"><img src="{{ url('images/icons/balance.svg') }}" style="width: 80px"> Your Balance</h3>
                <h1 class="balance-heading mb-0" id="wallet-amount">{{ $user->wallet->amount }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-8">

        {{-- Row 1: Amount --}}
        <div class="form-row mb-3">
            {{-- Amount Label --}}
            <div class="col-md-6 mb-3 text-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text fund-input-icon"><img src="/images/icons/amount-to-fund.svg" alt="Amount To Fund"></span>
                    </div>
                    <input type="text" value="Amount To Fund ({{ config('app.currency') }})" class="form-control fund-input" readonly>
                </div>
            </div>

            {{-- Amount Input --}}
            <div class="col-md-6 text-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text fund-input-icon"><img src="/images/icons/dollar-sign.svg" alt="Amount To Fund"></span>
                    </div>
                    <input type="number" name="amount" min="{{ $min_with }}" max="{{ $max_with }}"  value="{{ old('amount') }}" class="form-control fund-input" id="amount" placeholder="{{ $min_with }}" aria-describedby="currency" required="">
                </div>
                <div class="invalid-feedback" id="amountFeedback"></div>
            </div>
        </div>


        {{-- Row 2 Withdraw Method & Bitcoin ADdress --}}
        <div class="form-row mb-3">
            {{-- Select Withdraw Method --}}
            <div class="col-md-6 mb-3">
                <select name="withdraw_method" class="form-control fund-input @error('withdraw_method') is-invalid @enderror" id="input-select" required>
                    <option value="bitcoin" selected>Bitcoin</option>
                </select>
                <div class="invalid-feedback" id="amountFeedback"></div>
            </div>

            {{-- Bitcoin Address Input --}}
            <div class="col-md-6 text-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text fund-input-icon"><img src="/images/icons/bitcoin-wallet.svg" alt="bitcoin-wallet"></span>
                    </div>
                    <input type="text" name="bitcoin_address" disabled value="{{ old('bitcoin_address') }}" class="form-control fund-input" id="bitcoin_address" placeholder="Enter Address e.g 16oEfPvNr9RL2otUVPrQtpzQPCfgXjk5cr" required="">
                </div>
            </div>
        </div>

        {{-- Submit Button --}}
        <button class="btn btn-primary btn-block fund-btn btn-sm" disabled type="submit">Submit</button>
    </div>
</div><hr>

@if($withdrawals->count() > 0)
<div class="row">
    <div class="col-md-12">
        <div class="card manage-investments">
            <h4 class="card-header">Pending Withdrawals</h4>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
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
    var wallet_amount = "{{ config('app.currency') }}" + numberWithCommas($('#wallet-amount').html())

    $('#wallet-amount').html(wallet_amount)

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
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
