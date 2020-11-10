@extends('layouts.dashboard.main')
@section('title', 'Make a Deposit')
@section('deposit-active', 'active')
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
            <h1 class="m-0">Make a Deposit</h1>
        </div>
    </div>
</div>


@include('layouts.alerts')

<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Payment Method</strong></p>
                <p class="text-muted mb-3">Here are a list of our supported payment method:</p>
                <ul>
                    <li><img alt="Coinpayments Logo" src="/images/payments/coinpayments.png" width="150" class="mb-3"></li>
                </ul>
                <p class="text-muted mb-0">For other payment methods, please contact us on our live chat or send us a mail at <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>.</p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <div class="form-group d-flex flex-column">
                    <h5 class="text-capitalize">
                        How to make a deposit through <img alt="PayPal Logo" src="/images/payments/coinpayments.png" width="150"> on your {{ config('app.name') }} account
                    </h5>
                    <ul>
                        <li>Type in the amount you want to deposit</li>
                        <li>Click the coinpayments button to begin payment process</li>
                        <li>Make payment to the address generated from coinpayments</li>
                        {{-- <li>Here is the Bitcoin Address: <a class="text-danger" id="bitcoin-address" href="javascript::void(0)" onclick="copyAddress('bitcoin-address')">adkaf738bd678ikmnhy7890pl76r432qas</a> <small>** click or select to copy address</small></li> --}}
                        <li>After making payment, fill the form below to upload proof of payment (either a screenshot or pdf document)</li>
                        <li>Select payment method to indicate if your want to credit your <b class="text-success">1. MAIN BALANCE</b> or <b class="text-success">2. CLEAR COMMISSIONS BALANCE</b></li>
                        <li><b class="text-danger">Take Note!!!</b> Your payment will not be considered valid until you upload your proof of payment (for security reasons).</li>
                        <li>Your {{ config('app.name') }} account will be credited / commissions cleared as soon as payment has been confirmed.</li>
                        <li><b class="text-danger">Please Note:</b> Payment confirmation takes less than an hour to be processed.</li>
                        <li>Don't hesitate to contact us through our live chat or to send us a mail when you encounter a problem while making deposit.</li>
                    </ul>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <label for="currency">ENTER AMOUNT (MINIMUM: {{ config('app.currency').$min_dep }})</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="currency">{{ config('app.currency') }}</span>
                            </div>
                            <input type="number" name="amount" min="{{ $min_dep }}" max={{ $max_dep }}  value="{{ old('amount') }}" class="form-control" id="amount" placeholder="{{ $min_dep }}" aria-describedby="currency" autofocus= required="">
                        </div>
                        <div class="invalid-feedback" id="amountFeedback"></div>

                        <form action="https://www.coinpayments.net/index.php" method="post" style="display: inline">
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
                            <input type="image" id="cp_button" class="payment-button mt-3" src="https://www.coinpayments.net/images/pub/buynow-grey.png" disabled title="Pay directly with CoinPayments" alt="Buy Now with CoinPayments.net">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color text-capitalize">Already made a deposit?<br>Upload Your Proof Of Payment</strong></p>
                <p class="text-muted mb-0">Fill in the form and upload a screenshot or pdf document showing proof of payment. Your {{ config('app.name') }} account will be funded once payment has been confirmed in less than an hour.</p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <form action="{{ route('user.deposit.payment-upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input type="file" name="payment_evidence" id="payment_evidence" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="input-select">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="currency">{{ config('app.currency') }}</span>
                                </div>
                                <input type="number" name="amount" min="{{ $min_dep }}" value="{{ old('amount') }}" class="form-control @error('amount') is-invalid @enderror " placeholder="{{ $min_dep }}" aria-describedby="currency">
                            </div>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="input-select">Payment Method</label>
                            <select name="payment_method" class="form-control @error('payment_method') is-invalid @enderror" id="input-select" readonly>
                                <option value="bitcoin-address" selected>Bitcoin Address</option>
                            </select>
                            @error('payment_method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="input-select">Payment Type</label>
                            <select name="payment_type" class="form-control @error('payment_type') is-invalid @enderror" id="input-select" readonly>
                                <option value="balance" selected>Main Balance</option>
                                <option value="commission" >Clear Commissions</option>
                            </select>
                            @error('payment_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-block btn-lg" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('input-js')
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

