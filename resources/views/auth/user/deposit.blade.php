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
    <div class="col-md-3 col-sm-4 col-xs-6">
        <button disabled data-toggle="modal" data-target="#modal-fade" data-wallet-type="blockchain" onclick="passDataToModal(this);" class="btn btn-info btn-effect-ripple btn-block shadow btn-lg payment-button"><img src="{{ asset('images/payments/blockchain.png') }}" class="ml-3 hidden-xs" style="width: 25px"/> Pay with Blockchain</button>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <button disabled data-toggle="modal" data-target="#modal-fade" data-wallet-type="trust wallet" onclick="passDataToModal(this);" class="btn btn-style btn-effect-ripple btn-block shadow btn-lg payment-button"><img src="{{ asset('images/payments/trust-wallet.png') }}" class="hidden-xs" style="width: 40px"/> Pay with Trust Wallet</button>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <button disabled data-toggle="modal" data-target="#modal-fade" data-wallet-type="other crypto wallet" onclick="passDataToModal(this);" class="btn btn-warning btn-effect-ripple btn-block shadow btn-lg payment-button"><img src="{{ asset('images/payments/bitcoin.png') }}" class="ml-3 hidden-xs" style="width: 30px"/>Other Payment Method</button>
    </div>
    {{-- <div class="col-md-12">
        <form action="https://www.coinpayments.net/index.php" method="post" style="display: inline" class="mr-4 bord-right pr-4">
            <input type="hidden" name="cmd" value="_pay">
            <input type="hidden" name="reset" value="1">
            <input type="hidden" name="merchant" value="{{ config('payments.coinpayments') }}">
            <input type="hidden" name="item_name" value="{{ ucfirst(config('app.name')) }} Account Deposit">
            <input type="hidden" name="currency" value="USD">
            <input type="hidden" id="cp_amount" name="amountf" value="{{ $min_dep }}">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="allow_quantity" value="0">
            <input type="hidden" name="want_shipping" value="0">
            <input type="hidden" name="allow_currencies" value="BTC">
            <input type="hidden" name="first_name" value="{{ $user->first_name }}">
            <input type="hidden" name="last_name" value="{{ $user->last_name }}">
            <input type="hidden" name="email" value="{{ $user->email }}">
            <input type="image" id="cp_button" class="payment-button" src="https://www.coinpayments.net/images/pub/buynow-grey.png" disabled title="Pay directly with CoinPayments" alt="Buy Now with CoinPayments.net">
        </form>

        <form action="https://perfectmoney.is/api/step1.asp" method="post" style="display: inline">
            <input type="hidden" name="PAYEE_ACCOUNT" value="{{ config('payments.perfect_money') }}">
            <input type="hidden" name="PAYEE_NAME" value="{{ config('app.name') }}">
            <input type="hidden" id="pm_amount" name="PAYMENT_AMOUNT" value="{{ $min_dep }}">
            <input type="hidden" name="PAYMENT_UNITS" value="USD">
            <input type="hidden" name="STATUS_URL"
                value="{{ route('user.deposit.payment-status', 'success') }}">
            <input type="hidden" name="PAYMENT_URL"
                value="{{ route('user.deposit.payment-status', 'success') }}">
            <input type="hidden" name="NOPAYMENT_URL"
                value="{{ route('user.deposit.payment-status', 'failure') }}">
            <input type="hidden" name="BAGGAGE_FIELDS"
                value="method">
            <input type="hidden" name="method" value="pm">
            <input type="image" name="PAYMENT_METHOD" id="pm_button" class="payment-button" src="/images/payments/perfect-money.png" disabled title="Pay with Perfect Money" width="150px" alt="Buy Now with Perfect Money">
        </form>

    </div> --}}
</div><hr>

<div id="evidenceOfPayment"></div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="section-block" id="select">
            <h3 class="section-title">Already made a deposit? Upload Evidence of Payment</h3>
            <p class="text-muted">If you've already made a deposit, please upload your evidence of payment such as a screenshot or receipt of successful payment.</p>
        </div>
    </div>
</div>
<div class="row mb-5">
    <div class="col-md-12">
        <form action="{{ route('user.deposit.payment-upload') }}" method="POST" class="block full" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <input type="file" class="fund-input" name="payment_evidence" id="payment_evidence" required>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon text-lg">{{ config('app.currency') }}</span>
                        <input type="number" name="amount" min="{{ $min_dep }}" value="{{ old('amount') }}" class="form-control input-lg @error('amount') is-invalid @enderror" placeholder="{{ $min_dep }}" aria-describedby="currency">
                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="payment_method" class="form-control input-lg @error('payment_method') is-invalid @enderror" id="input-select" required>
                        <option value="blockchain" selected>Blockchain</option>
                        <option value="trust-wallet">Trust Wallet</option>
                        <option value="others">Others</option>
                    </select>
                    @error('payment_method')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary btn-block btn-lg" type="submit">Submit</button>
                </div>
            </div>
        </form>
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
                        <h3 class="visible-lg visible-xl">14ifSbBhn6UvaxHuQwS9eSzzHbwwwsGAi9</h3>
                        <h4 class="hidden-lg hidden-xl">14ifSbBhn6UvaxHuQwS9eSzzHbwwwsGAi9</h4>
                    </li>
                    <li>Once payment is successful. Take a screenshot of your payment and upload it below.</li>
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
            </div>
        </div>
    </div>
</div>
@endpush
@push('more-js')
<script>
    function passDataToModal(element) {
        var walletType = $(element).data('wallet-type');
        console.log(walletType)
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
