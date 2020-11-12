@extends('layouts.dashboard.main')
@section('title', ucfirst($package->name).' Investment')
@section('investments-active', 'active')
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
            <h1 class="m-0 text-capitalize"><a href="{{ route('user.investments') }}" title="Select another investment package"><i class="fas fa-arrow-left" aria-hidden="true"></i></a> {{ $package->name }} Investment</h1>
        </div>
    </div>
</div>




<div class="container-fluid page__container">
    <div class="row mb-5">
        <div class="col-md-12 text-right">
            <strong class="text-muted">Need more funds?</strong> <a class="btn btn-success btn-lg" href="{{ route('user.deposit') }}"><i class="fas fa-wallet mr-2"></i> Make a Deposit</a>
        </div>
    </div>
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color text-capitalize">{{ $package->name }} Investment Package</strong></p>
                <ul style="line-height: 1.7;">
                    <li>Duration: <strong class="text-primary">@if($package->duration == 7)1 Week @else 1 Month @endif</strong></li>
                    <li>Minimum Deposit: <strong class="text-success">{{ config('app.currency').$package->min_amount }}</strong></li>
                    <li>Maximum Deposit: <strong class="text-danger">{{ config('app.currency').$package->max_amount }}</strong></li>
                    <li>Start Date: <strong class="text-success">{{ now()->toFormattedDateString() }}</strong></li>
                    <li>End Date: <strong class="text-danger">{{ now()->endOfMonth()->subHours(18)->addMicroseconds(1)->toFormattedDateString() }}</strong></li>
                </ul>
                <em class="text-muted text-capitalize">Want to invest more and earn more profit?</em> <a href="{{ route('user.investments') }}" class="text-danger">Select a bigger investment plan.</a>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <form method="POST" action="{{ route('user.investments.invest', $package->name) }}">
                    @csrf
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
                            <div class="loader loader-primary loader-sm float-right mt-2" style="display: none" id="profit-loading" role="status">
                              <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
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
                            <button class="btn btn-success btn-block" disabled id="investment_button" type="submit"><i class="fas fa-chart-line mr-2"></i> Start Investment</button>
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
        var duration = {{ $duration }}
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
