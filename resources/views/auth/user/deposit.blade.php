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
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-muted">Method of Payment</h4>
            </div>
            <div class="col-md-12">
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

            </div>
        </div>
    </div>
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
                        <option value="coinpayments" selected>CoinPayments</option>
                        <option value="perfect-money">Perfect Money</option>
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
        var min_amount = {{ $min_dep }}
        var max_amount = {{ $max_dep }}
        $('#cp_amount').val(amount)
        $('#pm_amount').val(amount)
        if(amount >= min_amount && amount <= max_amount) {
            $('#cp_button').prop('disabled', false)
            $('#pm_button').prop('disabled', false)
            $('#amountFeedback').hide()
        } else {
            $('#cp_button').prop('disabled', true)
            $('#pm_button').prop('disabled', true)
            if ( amount < min_amount)
                $('#amountFeedback').html('!! Amount must be greater than $'+min_amount)
            else
                $('#amountFeedback').html('!! You can only deposit a maximum of $'+max_amount+' at a time.')
            $('#amountFeedback').show()
        }
    }
</script>
@endsection
