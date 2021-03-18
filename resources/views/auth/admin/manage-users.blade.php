@extends('layouts.dash.main')
@section('title', 'Manage Users')
@section('header-title', 'All Registered Users')
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layouts.alerts')
        <div class="block full">
            <div class="table-responsive">
                <table id="general-table" class="table table-vcenter table-hover table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Investments</th>
                            <th scope="col">Deposit Reqs.</th>
                            <th scope="col">Withdrawal Reqs.</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($reg_users->count() > 0)
                            @foreach($reg_users as $reg_user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-capitalize"><a href="{{ route('admin.manage.users.view', $reg_user->id) }}">{{ $reg_user->first_name.' '.$reg_user->last_name }}</a></td>
                                    <td>{{ $reg_user->email }}</td>
                                    <td class="text-warning">{{ config('app.currency').$reg_user->wallet->amount }}</td>
                                    <td>{{ $reg_user->investments->count() }}</td>
                                    <td>{{ $reg_user->deposits ->count() }}</td>
                                    <td>{{ $reg_user->withdrawals->count() }}</td>
                                    <td><span class="label @if($reg_user->role_id == role(config('roles.user'))) label-success @else label-danger @endif">{{ $reg_user->role->title }}</span></td>
                                    <td><span class="label @if($reg_user->status_id == status(config('status.active'))) label-success @else label-danger @endif">{{ $reg_user->status->title }}</span></td>
                                    <td>@if($reg_user->status_id == status(config('status.active')))
                                            @if($reg_user->role_id == role(config('roles.user')))
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#blockUser{{ $reg_user->id }}">Block Account</button>
                                            @endif
                                        @else
                                            <button class="btn btn-success btn-sm" onclick="event.preventDefault();
                                            document.getElementById('account-status{{ $reg_user->id }}').submit();">Activate Account</button>
                                            {{-- Activate User Account --}}
                                            <form id="account-status{{ $reg_user->id }}" action="{{ route('admin.manage.users.account-status', $reg_user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endif
                                        @if($reg_user->role_id == role(config('roles.user')))
                                            <button class="btn btn-block btn-danger btn-sm d-block mt-2" type="submit" onclick="deleteUser({{ $reg_user->id }})">Delete Account</button>
                                            {{-- Delete User Account --}}
                                            <form id="delete-user-{{ $reg_user->id }}" action="{{ route('admin.manage.users.delete', $reg_user->id) }}" method="POST" style="display: none;">
                                                @csrf @method('delete')
                                            </form>
                                        @endif
                                    </td>
                                    @push('modal')
                                        {{-- Block User Modal --}}
                                        <div class="modal fade" id="blockUser{{ $reg_user->id }}" tabindex="-1" role="dialog" aria-labelledby="blockUserLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-danger text-uppercase"> Reason *
                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="splash-container" method="POST" action="{{ route('admin.manage.users.account-status', $reg_user->id) }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea name="reason" class="form-control" id="reason" cols="30" rows="10" placeholder="Write your reasons here *"></textarea>
                                                                        @error('reason')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-block btn-danger" type="submit">Block Account</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endpush
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
@endsection
@push('more-js')
<script>
    function deleteUser(user_id = 0) {
        var delete_account = confirm('Are you sure you want to permanently delete this user account?')
        if(delete_account) {
            console.log(user_id)
            $("#delete-user-"+user_id).submit();
        }
    }
</script>
@endpush
