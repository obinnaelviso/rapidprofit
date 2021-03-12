@extends('layouts.dash.main')
@section('title', 'Manage Investments')
@section('header-title', 'View Pending/Completed Investment')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layouts.alerts')
        <div class="block full">
            <div class="block-title clearfix">
                <h2>Active Investments</h2>
                @if($active_investments->count() <= 0)
                    <small class="pull-right">Sorry, but no active investments running. Click on the link to <a href="#" class="text-warning">start an investment</a></small>
                @endif
            </div>
            <table id="general-table" class="table table-vcenter table-hover table-borderless">
                <thead>
                    <tr>
                        @php $i = 1; @endphp
                        <th scope="col">#</th>
                        <th scope="col">Package Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Profit-Per-Week</th>
                        <th scope="col">Total Payout</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($active_investments as $investment)
                        <tr>
                            @php
                                $investment_return = calculateInvestmentReturn($investment->amount, $investment->package->percentage, $investment->package->duration);
                            @endphp
                            <th scope="row">{{ $i++ }}</th>
                            <td class="text-capitalize">{{ $investment->package->name }}</td>
                            <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                            <td>@if($investment->package->duration == 7) 1 week @else 1 month @endif</td>
                            <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                            <td class="text-success">{{ config('app.currency').$investment_return[1] }}</td>
                            <td>{{ $investment->created_at->toFormattedDateString() }}</td>
                            <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                            <td><span class="label label-primary"> {{ $investment->status->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title clearfix">
                <h2>Completed Investments</h2>
            </div>
            <table id="general-table" class="table table-vcenter table-hover table-borderless">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Package Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Profit-Per-Week</th>
                        <th scope="col">Total Payout</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if($completed_investments->count() > 0)
                        @foreach($completed_investments as $investment)
                            <tr>
                                @php
                                    $investment_return = calculateInvestmentReturn($investment->amount, $investment->package->percentage, $investment->package->duration);
                                @endphp
                                <th scope="row">{{ $i++ }}</th>
                                <td class="text-capitalize">{{ $investment->package->name }}</td>
                                <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                                <td>@if($investment->package->duration == 7) 1 week @else 1 month @endif</td>
                                <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                                <td class="text-success">{{ config('app.currency').$investment_return[1] }}</td>
                                <td>{{ $investment->created_at->toFormattedDateString() }}</td>
                                <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                                <td><span class="label label-success"> {{ $investment->status->title }}</td>
                            </tr>
                        @endforeach
                    @else
                        <h5 class="text-dark">No completed investments yet. Click on the link to <a href="{{ route('user.investments') }}">start an investment</a>.</h5 class="text-danger">
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
