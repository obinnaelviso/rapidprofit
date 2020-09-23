@extends('layouts.dashboard.main')
@section('title', 'Manage Investments')
@section('manage-investments-active', 'active')
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
            <h1 class="m-0">Manage Investment Packages</h1>
        </div>
    </div>
</div>




<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <h3 class="card-header">Active Investments</h3>
            <div class="col-lg-12 card-body">

                <div class="table-responsive border-bottom">

                    <table class="table mb-0 thead-border-top-0">
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
                            @if($active_investments->count() > 0)
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
                            @else
                                <p class="text-muted text-uppercase">Sorry, but there are no active investments running. Click on the link to <a href="{{ route('user.investments') }}">start an investment</a>.</p>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            <h3 class="card-header">Completed Investments</h3>
            <div class="col-lg-12 card-body">

                <div class="table-responsive border-bottom">


                    <table class="table mb-0 thead-border-top-0">
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
                                <p class="text-muted text-uppercase">No completed investments yet. Click on the link to <a href="{{ route('user.investments') }}">start an investment</a>.</p>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('input-js')

@endsection
