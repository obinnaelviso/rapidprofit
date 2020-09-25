@extends('layouts.main')
@section('title', 'Manage Investments - '.config('app.name'))
@section('investments-active', 'active')
@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h1>Manage Investments</h1>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('layouts.alerts')
        <div class="card manage-investments">
            <h3 class="card-header">Active Investments</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                @php $i = 1; @endphp
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Package Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Profit-Per-Week</th>
                                <th scope="col">Total Payout</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
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
                                        <td class="text-capitalize">{{ $investment->user->first_name.' '.$investment->user->last_name }}</td>
                                        <td class="text-capitalize">{{ $investment->package->name }}</td>
                                        <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                                        <td>@if($investment->package->duration == 7) 1 Week @else 1 Month @endif</td>
                                        <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                                        <td class="text-success">{{ config('app.currency').$investment_return[1] }}</td>
                                        <td>{{ $investment->created_at->toFormattedDateString() }}</td>
                                        <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                                        <td><span class="label label-primary"> {{ $investment->status->title }}</span></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" onclick="deleteInvestment({{ $investment->id }})">Cancel</button>
                                            {{-- Delete User Account --}}
                                            <form id="delete-investment-{{ $investment->id }}" action="{{ route('admin.investments.cancel', $investment->id) }}" method="POST" style="display: none;">
                                                @csrf @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h5 class="text-dark">No active investment yet.
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card manage-investments">
            <h3 class="card-header">Completed Investments</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                @php $i = 1; @endphp
                                <th scope="col">#</th>
                                <th scope="col">User</th>
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
                                        <td class="text-capitalize">{{ $investment->user->first_name.' '.$investment->user->last_name }}</td>
                                        <td class="text-capitalize">{{ $investment->package->name }}</td>
                                        <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                                        <td>@if($investment->package->duration == 7) 1 week @else 1 month @endif</td>
                                        <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                                        <td class="text-success">{{ config('app.currency').$investment_return[1] }}</td>
                                        <td>{{ $investment->created_at->toFormattedDateString() }}</td>
                                        <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                                        <td><span class="label label-success"> {{ $investment->status->title }}</span></td>
                                    </tr>
                                @endforeach
                            @else
                                <h5 class="text-dark">No completed investments yet.
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
<script>
    function deleteInvestment(investment_id = 0) {
        var delete_investment = confirm('Are you sure you want to cancel this investment?')
        if(delete_investment) {
            $("#delete-investment-"+investment_id).submit();
        }
    }
</script>
@endsection