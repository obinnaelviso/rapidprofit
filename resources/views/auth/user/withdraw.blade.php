@extends('layouts.dash.main')
@section('title', 'Withdraw Funds')
@section('header-title', 'Make a withdrawal from your account')

@section('content')
<div class="row mb-3">
    @php
        $min_with = isset($general->min_with) ?$general->min_with:100;
        $max_with = isset($general->min_with) ?$general->max_with:1000000;
    @endphp
    <div class="col-md-12">
        <div class="alert alert-warning withdraw-alert">
            <ul>
                <li>You can withdraw a minimum of <b>{{ config('app.currency').$min_with }}</b></li>
                <li>All withdrawal requests are processed within 0-60 minutes.</li>
                <li>No amount is charged per withdrawal.</li>
            </ul>
        </div>
        @include('layouts.alerts')
    </div>
</div><hr>
<div class="row">
    @include('layouts.dash.balance')
    <div class="col-md-8">

        <form method="POST" action="{{ route('user.withdraw.funds') }}" class="block full">
            @csrf
            {{-- Row 1: Amount --}}
            <div class="row">
                {{-- Amount Label --}}
                <div class="col-md-6 text-right">
                    <input type="text" value="Amount To Fund ({{ config('app.currency') }})" class="form-control input-lg" readonly>
                </div>

                {{-- Amount Input --}}
                <div class="col-md-6 text-right">
                    <div class="input-group">
                        <span class="input-group-addon">{{ config('app.currency') }}</span>
                        <input type="number" name="amount" autocomplete="off" min="{{ $min_with }}" max="{{ $max_with }}"  value="{{ old('amount') }}" class="form-control input-lg" id="amount" placeholder="{{ $min_with }}" aria-describedby="currency" required="">
                    </div>
                    <div class="text-danger" id="amountFeedback"></div>
                </div>
            </div>


            {{-- Row 2 Withdraw Method & Bitcoin ADdress --}}
            <div class="row mb-3">
                {{-- Select Withdraw Method --}}
                <div class="col-md-6">
                    <select name="withdraw_method" class="form-control input-lg @error('withdraw_method') is-invalid @enderror" id="input-select" required>
                        <option value="bitcoin" selected>Bitcoin</option>
                    </select>
                </div>

                {{-- Bitcoin Address Input --}}
                <div class="col-md-6 text-right">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="hi hi-qrcode fa-2x"></i></span>
                        <input type="text" name="bitcoin_address" autocomplete="off" disabled value="{{ old('bitcoin_address') }}" class="form-control input-lg" id="bitcoin_address" placeholder="Enter Address e.g 16oEfPvNr9RL2otUVPrQtpzQPCfgXjk5cr" required="">
                    </div>
                </div>
            </div>

            {{-- Submit Button --}}
            <button class="btn btn-primary btn-block fund-btn btn-lg" id="withdraw_button" disabled type="submit">Submit</button>
        </form>
    </div>
</div><hr>

@if($withdrawals->count() > 0)
<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title clearfix"><h2>Withdrawal History</h2></div>
            <table class="table table-vcenter table-hover table-borderless">
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
                            <td>
                                @if ($withdrawal->status_id == status(config('status.pending')))
                                    <div class="badge badge-warning">
                                @else
                                    <div class="badge badge-success">
                                @endif
                                    {{ $withdrawal->status->title }}</div>
                            </td>
                            <td>{{ $withdrawal->created_at }}</td>
                            <td>
                                @if ($withdrawal->status_id == status(config('status.pending')))
                                    <a class="btn btn-warning" href="javascript::void(0)" onclick="event.preventDefault();
                                    document.getElementById('cancel-withdrawal-form').submit();">Cancel</a>
                                    <form id="cancel-withdrawal-form" action="{{ route('user.withdraw.cancel', $withdrawal->id) }}" method="POST" style="display: none;">
                                        @csrf @method('put')
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection
@push('more-js')
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
@endpush
