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




<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Payment Method</strong></p>
                <p class="text-muted mb-3">Here are a list of our supported payment method.</p>
                <p class="text-muted mb-0">For other payment methods, please contact us on our live chat or send us a mail at <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>.</p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <div class="form-group d-flex flex-column">
                    <img alt="PayPal Logo" src="/images/payments/bitcoin-logo.png" width="150">
                    <h5 class="text-capitalize">
                        How to make a deposit to your {{ config('app.name') }} account
                    </h5>
                    <ul>
                        <li>Send the amount worth of bitcoin in USD you would like to deposit to the address below</li>
                        <li>Here is the Bitcoin Address: <a class="text-danger" id="bitcoin-address" href="javascript::void(0)" onclick="copyAddress('bitcoin-address')">adkaf738bd678ikmnhy7890pl76r432qas</a> <small>** click or select to copy address</small></li>
                        <li>After making payment, fill the form below to upload proof of payment (either a screenshot or pdf document)</li>
                        <li>Your {{ config('app.name') }} account will be creditted as soon as payment has been confirmed.</li>
                        <li><b class="text-danger">Please Note:</b> Payment confirmation takes less than an hour to be processed.</li>
                        <li>Don't hesitate to contact us through our live chat or to send us a mail when you encounter a problem while making deposit.</li>
                    </ul>
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
                        <div class="col-md-12 mb-3">
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
    function copyAddress(id) {
        /* Get the text field */
        var copyText = document.getElementById(id);

        /* Select the text field */
        selectText(id)
        // copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Text copied to clipboard!");
    }

function selectText(containerid) {
    if (document.selection) { // IE
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select();
    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
    }
}

</script>
@endsection

