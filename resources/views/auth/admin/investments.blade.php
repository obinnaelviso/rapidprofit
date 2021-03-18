@extends('layouts.dash.main')
@section('title', 'Manage Investments')
@section('header-title', 'Manage Investment Plans')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layouts.alerts')
        <div class="block full manage-investments">
            <h3 class="card-header">Active Investments</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-hover table-borderless">
                        <thead>
                            <tr>
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
                                        <th scope="row">{{ $loop->iteration }}</th>
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
                                            <button class="btn btn-success btn-sm" onclick="completeInvestment({{ $investment->id }})">Mark As Complete</button>
                                            <button class="btn btn-warning btn-sm" onclick="cancelInvestment({{ $investment->id }})">Cancel</button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteInvestment({{ $investment->id }})">Delete</button>
                                            {{-- Complete Investment --}}
                                            <form id="complete-investment-{{ $investment->id }}" action="{{ route('admin.investments.complete', $investment->id) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            {{-- Cancel Investment --}}
                                            <form id="cancel-investment-{{ $investment->id }}" action="{{ route('admin.investments.cancel', $investment->id) }}" method="POST" style="display: none;">
                                                @csrf @method('delete')
                                            </form>
                                            {{-- Delete Investment --}}
                                            <form id="delete-investment-{{ $investment->id }}" action="{{ route('admin.investments.cancel', [$investment->id, 1]) }}" method="POST" style="display: none;">
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
        <div class="block full manage-investments">
            <h3 class="card-header">Completed Investments</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-hover table-borderless">
                        <thead>
                            <tr>
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
                            @if($completed_investments->count() > 0)
                                @foreach($completed_investments as $investment)
                                    <tr>
                                        @php
                                            $investment_return = calculateInvestmentReturn($investment->amount, $investment->package->percentage, $investment->package->duration);
                                        @endphp
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-capitalize">{{ $investment->user->first_name.' '.$investment->user->last_name }}</td>
                                        <td class="text-capitalize">{{ $investment->package->name }}</td>
                                        <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                                        <td>@if($investment->package->duration == 7) 1 week @else 1 month @endif</td>
                                        <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                                        <td class="text-success">{{ config('app.currency').$investment_return[1] }}</td>
                                        <td>{{ $investment->created_at->toFormattedDateString() }}</td>
                                        <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                                        <td><span class="label label-success"> {{ $investment->status->title }}</span></td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" onclick="deleteInvestment({{ $investment->id }})">Delete</button>
                                            {{-- Delete User Account --}}
                                            <form id="delete-investment-{{ $investment->id }}" action="{{ route('admin.investments.cancel', [$investment->id, 1]) }}" method="POST" style="display: none;">
                                                @csrf @method('delete')
                                            </form>
                                        </td>
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
@push('more-js')
<script>
    function completeInvestment(investment_id = 0) {
        var complete_investment = confirm('Are you sure you want to mark this investment as complete?')
        if(complete_investment) {
            $("#complete-investment-"+investment_id).submit();
        }
    }
    function cancelInvestment(investment_id = 0) {
        var cancel_investment = confirm('Are you sure you want to cancel this investment? \nInvested amount will be refunded to the user!')
        if(cancel_investment) {
            $("#cancel-investment-"+investment_id).submit();
        }
    }
    function deleteInvestment(investment_id = 0) {
        var delete_investment = confirm('Are you sure you want to delete this investment? \nWarning!!! Invested amount will not be refunded to the user!')
        if(delete_investment) {
            $("#delete-investment-"+investment_id).submit();
        }
    }
</script>
@endpush
