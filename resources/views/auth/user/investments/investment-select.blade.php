@extends('layouts.main')
@section('title', ucfirst($package->name).' Investment - '.config('app.name'))
@section('investments-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')

<div class="row mb-4">
    <div class="col-md-12">
        <h3><a href="{{ route('user.investments') }}" title="Go back to Investment Packages"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> <img src="/images/icons/investments-big.svg" class="mr-2" alt="investments" width="25">  {{ ucfirst($package->name) }} Investment</h3>
    </div>
</div>

<div class="row investments-row">
    <div class="col-md-4">
        <div class="card balance-bg">
            <div class="card-body">
                <h3 class="balance-heading mb-3"><img src="{{ url('images/icons/balance.svg') }}" style="width: 80px"> Your Balance</h3>
                <h1 class="balance-heading mb-0" id="wallet-amount">{{ $user->wallet->amount }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form method="POST" action="{{ route('user.investments.invest', $package->name) }}">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <label for="amount" class="text-muted">Amount (minimum: {{ config('app.currency').$package->min_amount }})</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text fund-input-icon" id="currency"><img src="/images/icons/amount-to-fund.svg" alt="Amount To Fund"></span></span>
                        </div>
                        <input type="number" name="amount" min="{{ $package->min_amount }}"  max="{{ $package->max_amount }}" value="{{ old('amount')?: $package->min_amount }}" class="form-control fund-input" id="amount" placeholder="{{ $package->min_amount }}" aria-describedby="currency" required="">
                    </div>
                    <div class="invalid-feedback" id="amountFeedback"></div>
                </div>
                <div class="col-md-6 text-right">
                    <label for="profit" class="text-muted">{{ $package->percentage }}% Profit Per Week</label>
                    <input type="text" class="form-control text-success text-right fund-input" disabled id="profit" value="+{{ config('app.currency') }}0">
                    <div class="spinner-border text-success spinner-small mt-2" style="display: none" id="profit-loading" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div><hr>
            <div class="form-row">
                <div class="col-md-6">
                    <label class="text-muted">Duration</label>
                </div>
                <div class="col-md-6 text-right">
                    <label class="text-muted">@if($package->duration == 7)1 Week @else 1 Month @endif</label>
                </div>
            </div><hr>
            <div class="form-row">
                <div class="col-md-6">
                    <label class="text-muted">Start Date</label>
                </div>
                <div class="col-md-6 text-right">
                    <label class="text-muted">{{ now()->toFormattedDateString() }}</label>
                </div>
            </div><hr>
            <div class="form-row">
                <div class="col-md-6">
                    <label class="text-muted">End Date</label>
                </div>
                <div class="col-md-6 text-right">
                    <label class="text-muted">{{ now()->addDays($package->duration)->toFormattedDateString() }}</label>
                </div>
            </div><hr>
            <div class="form-row">
                <div class="col-md-6">
                    <label class="text-muted">Total Payout With Capital </label>
                </div>
                <div class="col-md-6 text-right">
                    <label class="text-muted" id="payout">{{ config('app.currency').'0' }}</label>
                </div>
            </div><hr>
            <div class="form-row">
                <div class="col-md-12">
                    <button class="btn btn-primary fund-btn btn-block" disabled id="investment_button" type="submit">Start Investment</button>
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
    computeInvestment()

    $('#amount').on('input', computeInvestment)

    function computeInvestment() {
        var amount = $('#amount').val()
        var percentage = {{ $package->percentage }}
        var min_amount = {{ $package->min_amount }}
        var max_amount = {{ $package->max_amount }}
        var balance = {{ $user->wallet->amount }}
        var duration = {{ $package->duration }}
        $('#profit-loading').show()
        $('#amountFeedback').hide()
        $.ajax({
            url: "{{ route('user.investments.calculate-profit') }}",
            type: 'GET',
            data: {
                    'amount': amount,
                    'percentage': percentage,
                    'min_amount': min_amount,
                    'max_amount': max_amount,
                    'duration': duration

                },
            success: function(response)
            {
                $('#profit-loading').hide()
                $('#profit').val("+$"+response.profit)
                $('#payout').html("$"+response.payout)

                // Perform validation for form amount
                if(balance < amount) {
                    $('#amountFeedback').html('Insufficient funds. Please make a deposit to continue!')
                    $('#amountFeedback').show();
                    $('#investment_button').prop('disabled', true)
                }
                else if (response.profit <= 0) {
                    $('#amountFeedback').html('Amount must be within range of $'+min_amount+' and $'+max_amount+'.')
                    $('#amountFeedback').show();
                    $('#investment_button').prop('disabled', true)
                } else {
                    $('#amountFeedback').hide();
                    $('#investment_button').prop('disabled', false)
                }
            },
            error: function(xhr, status, error) {
                $('#amountFeedback').html('Oops! It looks like something went wrong. Please try again!')
                $('#amountFeedback').show();
                $('#profit-loading').hide()
                $('#investment_button').prop('disabled', true)
            }
        });
    }
</script>
@endsection
