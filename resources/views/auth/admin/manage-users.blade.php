@extends('layouts.main')
@section('title', 'Manage Users - '.' Admin '.config('app.name'))
@section('users-active', 'active')
@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h1>Manage Users</h1>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h3 class="card-header">All Registered Users</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                @php $i = 1; @endphp
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Investments</th>
                                <th scope="col">Deposit Reqs.</th>
                                <th scope="col">Withdrawal Reqs.</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($reg_users->count() > 0)
                                @foreach($reg_users as $reg_user)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td class="text-capitalize"><a href="{{ route('admin.manage.users.view', $reg_user->id) }}">{{ $reg_user->first_name.' '.$reg_user->last_name }}</a></td>
                                        <td>{{ $reg_user->email }}</td>
                                        <td class="text-warning">{{ config('app.currency').$reg_user->wallet->amount }}</td>
                                        <td>{{ $reg_user->investments->count() }}</td>
                                        <td>{{ $reg_user->deposits ->count() }}</td>
                                        <td>{{ $reg_user->withdrawals->count() }}</td>
                                        <td><span class="label @if($reg_user->status_id == status(config('status.active'))) label-success @else label-danger @endif">{{ $reg_user->status->title }}</span></td>
                                        <td><button class="btn btn-danger btn-sm">Block User</button></td>
                                    </tr>
                                @endforeach
                            @else
                                <h5 class="text-primary text-capitalize">No new registered user available yet!</h5>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
