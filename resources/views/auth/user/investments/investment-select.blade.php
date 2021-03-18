@extends('layouts.dash.main')
@section('title', ucfirst($package->name).' Investment')
@section('header-title', ucfirst($package->name).' Investment')

@section('content')
<div class="row">
    @include('layouts.dash.balance')
    <div class="col-md-8">
        <form method="POST" action="{{ route('user.investments.invest', $package->name) }}" class="block full">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="amount" class="text-muted">Amount (minimum: {{ config('app.currency').$package->min_amount }})</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="currency">{{ config('app.currency') }}</span>
                        <input type="number" name="amount" autocomplete="off" min="{{ $package->min_amount }}"  max="{{ $package->max_amount }}" value="{{ old('amount')?: $package->min_amount }}" class="form-control input-lg" id="amount" placeholder="{{ $package->min_amount }}" aria-describedby="currency" required="">
                    </div>
                    <div class="invalid-feedback" id="amountFeedback"></div>
                </div>
                <div class="col-md-6 text-right">
                    <label for="profit" class="text-muted">{{ $package->percentage }}% Profit Per Week</label>
                    <input type="text" class="form-control text-right input-lg" disabled id="profit" value="+{{ config('app.currency') }}0">
                    <i class="fa fa-spinner fa-spin text-success" style="display: none" id="profit-loading" role="status"><span class="sr-only">Loading...</span></i>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-6">
                    <label class="text-muted">Duration</label>
                </div>
                <div class="col-md-6 text-right">
                    <label class="text-muted">@if($package->duration == 7)1 Week @else 1 Month @endif</label>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-6">
                    <label class="text-muted">Start Date</label>
                </div>
                <div class="col-md-6 text-right">
                    <label class="text-muted">{{ now()->toFormattedDateString() }}</label>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-6">
                    <label class="text-muted">End Date</label>
                </div>
                <div class="col-md-6 text-right">
                    <label class="text-muted">{{ now()->addDays($package->duration)->toFormattedDateString() }}</label>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-6">
                    <label class="text-muted">Total Payout With Capital </label>
                </div>
                <div class="col-md-6 text-right">
                    <label class="text-muted" id="payout">{{ config('app.currency').'0' }}</label>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block btn-lg" disabled id="investment_button" type="submit">Start Investment</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
@endpush
