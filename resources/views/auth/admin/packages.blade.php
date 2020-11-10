@extends('layouts.dashboard.main')
@section('title', 'Manage Packages')
@section('packages-active', 'active')
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
            <h1 class="m-0">Manage Investment Packages</h1>
        </div>
    </div>
</div>



<div class="container-fluid page__container">
    @include('layouts.alerts')
    <div class="card card-form">
        <div class="row no-gutters">
            <button class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#addInvestment"><i class="fa fa-plus" aria-hidden="true"></i> Click To Add Investment Package</button>
            @push('modals')@include('auth.admin.packages.packages-create-modal')@endpush
            <div class="col-lg-12">
                <div class="table-responsive border-bottom">

                    <table class="table mb-0 thead-border-top-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Min. Amount</th>
                                <th scope="col">Max. Amount</th>
<<<<<<< HEAD
                                <th scope="col">Gift Bonus</th>
                                <th scope="col">Percentage</th>
=======
                                {{-- <th scope="col">Gift Bonus</th> --}}
                                <th scope="col">Percentage</th>
                                <th scope="col">Commissions <br>Percentage</th>
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
                                <th scope="col">Duration (days)</th>
                                <th scope="col">Investments</th>
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
<<<<<<< HEAD
                                    <td class="text-success">+{{ config('app.currency').$package->gift_bonus }}</td>
                                    <td>{{ $package->percentage }}%</td>
=======
                                    {{-- <td class="text-success">+{{ config('app.currency').$package->gift_bonus }}</td> --}}
                                    <td>{{ $package->percentage }}%</td>
                                    <td>{{ $package->commissions_percentage }}%</td>
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
                                    <td>{{ $package->duration }}</td>
                                    <td>{{ $package->investments->count() }}</td>
                                    <td>@if($package->status_id == status(config('status.active')))<div class="badge badge-success"> @else <div class="badge badge-danger"> @endif {{ $package->status->title }}</div></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm btn-block mb-2" data-toggle="modal" data-target="#editInvestment{{ $package->id }}">Edit</button>
                                        @push('modals')@include('auth.admin.packages.packages-edit-modal')@endpush
                                        @if($package->investments->count())
                                            @if($package->status_id == status(config('status.active')))
                                                <button class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                                                document.getElementById('package-status{{ $package->id }}').submit();">Deactivate</button>
                                            @else
                                                <button class="btn btn-success btn-sm btn-block" onclick="event.preventDefault();
                                                document.getElementById('package-status{{ $package->id }}').submit();">Activate</button>
                                            @endif
                                            <form id="package-status{{ $package->id }}" action="{{ route('admin.packages.status', $package->id) }}" method="POST" style="display: none;">
                                                @csrf @method('put')
                                            </form>
                                        @else
                                            <button class="btn btn-block btn-dark btn-sm" type="submit" onclick="deletePackage({{ $package->id }})">Delete</button>
                                            {{-- Delete Investment Package --}}
                                            <form id="delete-package-{{ $package->id }}" action="{{ route('admin.packages.delete', $package->id) }}" method="POST" style="display: none;">
                                                @csrf @method('delete')
                                            </form>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
    function deletePackage(package_id) {
        var delete_package = confirm('Are you sure you want to permanently delete this investment package?')
        if(delete_package) {
            $("#delete-package-"+package_id).submit();
        }
    }
</script>
@endsection
