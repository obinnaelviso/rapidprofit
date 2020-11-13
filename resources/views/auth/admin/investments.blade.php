@extends('layouts.dashboard.main')
@section('title', 'Manage Investments')
@section('investments-active', 'active')
@section('sidebar')
@include('layouts.sidebar-admin')
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
            <h1 class="m-0">Manage Investments</h1>
        </div>
    </div>
</div>




<div class="container-fluid page__container">
    @include('layouts.alerts')
    <div class="card card-form">
        <div class="row no-gutters">
            @if($active_investments->count() > 0)
                <div class="col-lg-12">
                    <h3 class="card-header">Active Investments</h3>
                    <div class="table-responsive border-bottom">

                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Package Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Commissions</th>
                                    <th scope="col">Profit-Per-Day <br> (exc. weekends)</th>
                                    <th scope="col">Total Payout</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($active_investments as $investment)
                                    <tr>
                                        @php
                                            $investment_return = calculateInvestmentReturn($investment->amount, $investment->package->percentage, $investment->package->duration);
                                        @endphp
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-capitalize">{{ $investment->user->first_name.' '.$investment->user->last_name }}</td>
                                        <td class="text-capitalize">{{ $investment->package->name }}</td>
                                        <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                                        <td class="text-danger">{{ config('app.currency').$investment->commission }}</td>
                                        <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                                        <td class="text-success">{{ config('app.currency').$investment->payout->amount }}</td>
                                        <td>
                                            @if($investment->start_at != null)
                                                {{ $investment->start_at->toFormattedDateString() }}
                                            @else
                                                {{ $investment->created_at->toFormattedDateString() }}
                                            @endif
                                        </td>
                                        <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                                        <td><span class="badge badge-primary"> {{ $investment->status->title }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" onclick="deleteInvestment({{ $investment->id }})">Cancel</button>
                                            {{-- Cancel User Investment --}}
                                            <form id="delete-investment-{{ $investment->id }}" action="{{ route('admin.investments.cancel', $investment->id) }}" method="POST" style="display: none;">
                                                @csrf @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="col-lg-12 card-body">
                    <h4>No active investments running.</h4>
                </div>
            @endif
        </div>
    </div>
</div>


<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters">
            @if($completed_investments->count() > 0)
                <div class="col-lg-12">
                    <h3 class="card-header">Completed Investments</h3>
                    <div class="table-responsive border-bottom">

                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Package Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Commission</th>
                                    <th scope="col">Profit-Per-Day <br> (exc. weekends)</th>
                                    <th scope="col">Total Payout</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($completed_investments as $investment)
                                    <tr>
                                        @php
                                            $investment_return = calculateInvestmentReturn($investment->amount, $investment->package->percentage, $investment->package->duration);
                                        @endphp
                                        <th scope="row">{{ $investment->iteration }}</th>
                                        <td class="text-capitalize">{{ $investment->user->first_name.' '.$investment->user->last_name }}</td>
                                        <td class="text-capitalize">{{ $investment->package->name }}</td>
                                        <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                                        <td class="text-danger">{{ config('app.currency').$investment->commission }}</td>
                                        <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                                        <td class="text-success">{{ config('app.currency').$investment->payout->amount }}</td>
                                        <td>
                                            @if($investment->start_at != null)
                                                {{ $investment->start_at->toFormattedDateString() }}
                                            @else
                                                {{ $investment->created_at->toFormattedDateString() }}
                                            @endif
                                        </td>
                                        <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                                        <td><span class="badge badge-success"> {{ $investment->status->title }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            @else
                <div class="col-lg-12 card-body">
                    <h4>No completed investments yet.</h4>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('input-js')
<script>
    function deleteInvestment(investment_id = 0) {
        var delete_investment = confirm('Are you sure you want to cancel this investment?')
        if(delete_investment) {
            $("#delete-investment-"+investment_id).submit();
        }
    }
</script>
@endsection
