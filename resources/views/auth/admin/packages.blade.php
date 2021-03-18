@extends('layouts.dash.main')
@section('title', 'Manage Packages')
@section('header-title', 'Manage Investment Packages')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="block full manage-investments">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addInvestment"><i class="fa fa-plus" aria-hidden="true"></i> Click To Add Investment Package</button>
            @push('modal')@include('auth.admin.packages.packages-create-modal')@endpush
            <div class="table-responsive">
                <table class="table table-vcenter table-hover table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Min. Amount</th>
                            <th scope="col">Max. Amount</th>
                            <th scope="col">Gift Bonus</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Duration (days)</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="text-capitalize">{{ $package->name }}</td>
                                <td>{{ $package->description?:"N/A" }}</td>
                                <td>{{ config('app.currency').$package->min_amount }}</td>
                                <td>{{ config('app.currency').$package->max_amount }}</td>
                                <td class="text-success">+{{ config('app.currency').$package->gift_bonus }}</td>
                                <td>{{ $package->percentage }}%</td>
                                <td>{{ $package->duration }}</td>
                                <td>@if($package->status_id == status(config('status.active')))<div class="label label-success"> @else <div class="label label-danger"> @endif {{ $package->status->title }}</div></td>
                                <td>
                                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#editInvestment{{ $package->id }}">Edit</button>
                                    @include('auth.admin.packages.packages-edit-modal')
                                    @if($package->status_id == status(config('status.active')))
                                        <button class="btn btn-danger" onclick="event.preventDefault();
                                        document.getElementById('package-status{{ $package->id }}').submit();">Deactivate</button>
                                    @else
                                        <button class="btn btn-success" onclick="event.preventDefault();
                                        document.getElementById('package-status{{ $package->id }}').submit();">Activate</button>
                                    @endif
                                    <form id="package-status{{ $package->id }}" action="{{ route('admin.packages.status', $package->id) }}" method="POST" style="display: none;">
                                        @csrf @method('put')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
