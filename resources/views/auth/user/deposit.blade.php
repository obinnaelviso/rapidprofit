@extends('layouts.dash.main')
@section('title', 'Deposit')
@section('header-title', 'Make a Deposit')
@section('content')
<div class="row">
    @include('layouts.alerts')
    <div class="col-md-4">
        <a href="javascript:void(0)" class="widget">
            <div class="widget-content widget-content-mini text-right clearfix">
                <div class="widget-icon pull-left themed-background-success">
                    <i class="gi gi-money text-light-op"></i>
                </div>
                <h2 class="widget-heading text-success h3">
                    <strong>{{ config('app.currency') }}<span data-toggle="counter" data-to="{{ $user->wallet->amount }}"></span></strong>
                </h2>
                <span class="text-muted">YOUR BALANCE</span>
            </div>
        </a>
    </div>
    <div class="col-md-8">
        <div class="block full">
            <div class="row">
                <div class="col-md-6">
                    <label class="sr-only" for="amount-to-fund">Amount to Fund</label>
                    <input type="text" id="amount-to-fund" value="Amount To Fund ({{ config('app.currency') }})" class="form-control input-lg" readonly>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon">{{ config('app.currency') }}</span>
                        <input type="number" name="amount" min="{{ $min_dep }}" max={{ $max_dep }}  value="{{ old('amount') }}" class="form-control input-lg" id="amount" placeholder="{{ $min_dep }}" aria-describedby="currency" required="">
                    </div>
                    <div class="invalid-feedback" id="amountFeedback"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="text-muted">Method of Payment</h4>
    </div>
    <div class="col-md-3 col-xs-6">
        <button disabled data-toggle="modal" data-target="#modal-fade" data-wallet-type="blockchain" onclick="passDataToModal(this);" class="btn btn-info btn-effect-ripple btn-block shadow btn-lg payment-button"><img src="{{ asset('images/payments/blockchain.png') }}" class="ml-3" style="width: 25px"/> Pay with Blockchain</button>
    </div>
    <div class="col-md-3 col-xs-6">
        <button disabled data-toggle="modal" data-target="#modal-fade" data-wallet-type="trust wallet" onclick="passDataToModal(this);" class="btn btn-style btn-effect-ripple btn-block shadow btn-lg payment-button"><img src="{{ asset('images/payments/trust-wallet.png') }}" style="width: 40px"/> Pay with Trust Wallet</button>
    </div>
    <div class="col-md-3 col-xs-6">
        <button disabled data-toggle="modal" data-target="#modal-fade" data-wallet-type="other crypto wallet" onclick="passDataToModal(this);" class="btn btn-warning btn-effect-ripple btn-block shadow btn-lg payment-button"><img src="{{ asset('images/payments/bitcoin.png') }}" class="ml-3" style="width: 30px"/>Other Payment Method</button>
    </div>
</div>
@endsection
@push('modal')
<div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title text-capitalize"><strong>How to Pay With <span class="wallet-type"></span></strong></h3>
            </div>
            <div class="modal-body">
                <h4>Follow these steps to pay with <span class="wallet-type"></span></h4>
                <ol>
                    <li>Open your <span class="wallet-type"> app on your mobile phone.</li>
                    <li>Select BTC as your wallet type/cryptocurrency</li>
                    <li>Make sure you have enough BTC on your app and click to send BTC.</li>
                    <li>Type in the amount you want to send equivalent to dollar ({{ config('app.currency') }}).</li>
                    <li>
                        Type in the address below or scan the QR Code: <br><br>
                        <div class="text-center"><img src="{{ asset('images/my-wallet.jpeg') }}" style="width: 200px"/><div>
                        <h3>14ifSbBhn6UvaxHuQwS9eSzzHbwwwsGAi9</h3>
                    </li>
                    <li>Click the submit button after making payment to process it.</li>
                    <li>Your account will be creditted instantly once payment has being confirmed.</li>
                    <div class="alert alert-info" role="alert">
                      <h4 class="alert-heading">Any issue? Please Contact Us:</h4>
                      <p>Incase you run into issue making payment. Don't hesitate to contact us on our live chat or send us a message at <a href="mailto: {{ config('mail.from.address') }}" class="text-dark" target="_blank">{{ config('mail.from.address') }}</a></p>
                      <p class="mb-0"></p>
                    </div>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" style="overflow: hidden; position: relative;">Close</button>
                <form action="{{ route('user.deposit.payment-upload') }}" method="POST" style="display: inline">
                    @csrf
                    <input type="hidden" class="form-control" name="amount" id="amount-in">
                    <input type="hidden" class="form-control" name="payment_method" id="payment-method-in">
                    <button class="btn btn-effect-ripple btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush
@push('more-js')
<script>
    function passDataToModal(element) {
        var walletType = $(element).data('wallet-type');
        var amount = $('#amount').val();
        $('#payment-method-in').val(walletType.replaceAll(' ', '-'));
        $('#amount-in').val(amount);
        $('#modal-fade .wallet-type').text(walletType);
    }
</script>
<script>
    computeAmount()

    $('#amount').on('input', computeAmount)

    function computeAmount() {
        var amount = $('#amount').val()
        var min_amount = {{ $min_dep }}
        var max_amount = {{ $max_dep }}
        $('#cp_amount').val(amount)
        $('#pm_amount').val(amount)
        if(amount >= min_amount && amount <= max_amount) {
            $('.payment-button').prop('disabled', false)
            $('#amountFeedback').hide()
        } else {
            $('.payment-button').prop('disabled', true)
            if ( amount < min_amount)
                $('#amountFeedback').html('!! Amount must be greater than $'+min_amount)
            else
                $('#amountFeedback').html('!! You can only deposit a maximum of $'+max_amount+' at a time.')
            $('#amountFeedback').show()
        }
    }
</script>
@endpush
