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
<div class="row block full">
    <div class="col-md-12 block-header">
        <h4>Other Withdrawal Methods</h4><hr>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="#" data-target="#other-payment" onclick="otherPaymentMethod(this);" data-toggle="modal" data-payment-type="paypal"><img src="{{ asset('images/payments/paypal.png') }}" class="img-responsive" alt="paypal"></a>
    </div>
    <div class="col-md-3 col-xs-6">
        <a href="#" data-target="#other-payment" onclick="otherPaymentMethod(this);" data-toggle="modal" data-payment-type="skrill"><img src="{{ asset('images/payments/skrill.png') }}" class="img-responsive" alt="skrill"></a>
    </div>
</div>
</div>

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
@push('modal')
{{-- Edit investment --}}
<div class="modal fade" id="other-payment" tabindex="-1" role="dialog" aria-labelledby="other-payment" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Pay with <span class="payment-type text-capitalize"></span>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
            <div class="modal-body text-center">
                <h4>
                <strong class="text-uppercase">To pay with <span class="payment-type"></span></strong> <br><br>
                Please contact our support through our live chat <br>
                or email us at <strong>{{ config('mail.from.address') }}</strong> <br><br>
                You can also send us a message on Whatsapp <i class="fa fa-whatsapp" aria-hidden="true"></i><br>
                <strong>+14235239123, +447451243042</strong>
                <br><br>
                Thank you for choosing <strong class="text-uppercase">{{ config('app.name') }}</strong>.
                </h4>

            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

@endpush
@push('more-js')
<script>
    function otherPaymentMethod(element) {
        var paymentMethod = $(element).data('payment-type');
        // console.log(paymentMethod);
        $('.modal-content span.payment-type').html(paymentMethod);
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
