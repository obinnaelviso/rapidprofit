@extends('layouts.main')
@section('title', ucfirst($package->name).' Investment - '.config('app.name'))
@section('investments-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')

<div class="row mb-4">
    <div class="col-md-12">
        <h2><a href="{{ route('user.investments') }}" title="Go back to Investment Packages"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> {{ ucfirst($package->name) }} Investment</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{ route('user.investments.invest', $package->name) }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <h4>Balance:</h4>
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-right">{{ config('app.currency').$user->wallet->amount }}</h1>
                    </div>
                </div><hr>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="amount">Amount (minimum: {{ config('app.currency').$package->min_amount }})</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="currency">{{ config('app.currency') }}</span>
                            </div>
                            <input type="number" name="amount" min="{{ $package->min_amount }}"  max="{{ $package->max_amount }}" value="{{ old('amount')?: $package->min_amount }}" class="form-control" id="amount" placeholder="{{ $package->min_amount }}" aria-describedby="currency" required="">
                        </div>
                        <div class="invalid-feedback" id="amountFeedback"></div>
                    </div>
                    <div class="col-md-6 text-right">
                        <label for="profit">{{ $package->percentage }}% Profit Per Week</label>
                        <input type="text" class="form-control text-success text-right" disabled id="profit" value="+{{ config('app.currency') }}0">
                        <div class="spinner-border text-success spinner-small mt-2" style="display: none" id="profit-loading" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div><hr>
                <div class="form-row">
                    <div class="col-md-6">
                        <h4>Duration:</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-danger text-right">@if($package->duration == 7)1 Week @else 1 Month @endif</h4>
                    </div>
                </div><hr>
                <div class="form-row">
                    <div class="col-md-6">
                        <h4>Start Date:</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-success text-right">{{ now()->toFormattedDateString() }}</h4>
                    </div>
                </div><hr>
                <div class="form-row">
                    <div class="col-md-6">
                        <h4>End Date:</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-danger text-right">{{ now()->addDays($package->duration)->toFormattedDateString() }}</h4>
                    </div>
                </div><hr>
                <div class="form-row">
                    <div class="col-md-6">
                        <h4>Total Payout With Capital: </h4>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-success text-right" id="payout">{{ config('app.currency').'0' }}</h2>
                    </div>
                </div><hr>
                <div class="form-row">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-block" disabled id="investment_button" type="submit">Start Investment</button>
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
