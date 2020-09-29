@extends('layouts.dashboard.main')
@section('title', 'Manage Withdrawals')
@section('withdrawals-active', 'active')
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
            <h1 class="m-0">Manage Withdrawals</h1>
        </div>
    </div>
</div>




<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters" id="pending-table">

            @if($pending_requests->count())
                <div class="col-lg-12">
                    <h3 class="card-header">Pending Withdrawal Requests</h3>
                    <div class="table-responsive border-bottom">

                        <table class="table mb-0 thead-border-top-0">
                            <thead class="thead-inverse">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Bitcoin Address</th>
                                    <th scope="col">Request Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pending_requests->get() as $withdrawal)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-capitalize"><a class="text-dark" href="{{ route('admin.manage.users.view', $withdrawal->user->id) }}" target="_blank">{{ $withdrawal->user->first_name.' '.$withdrawal->user->last_name }}</td></td>
                                        <td class="text-capitalize">{{ $withdrawal->withdraw_method }}</td>
                                        <td>{{ config('app.currency').$withdrawal->amount }}</td>
                                        <td>{{ $withdrawal->bitcoin_address }}</td>
                                        <td>{{ $withdrawal->created_at }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm btn-block" onclick="newWithdrawal('{{ $withdrawal->id }}', {{ $withdrawal->user->id }})">Complete Withdrawal</button>
                                            <button class="btn btn-danger btn-sm btn-block mt-2" onclick="event.preventDefault();
                                            document.getElementById('cancel-withdrawal-form').submit();">Cancel</button>
                                            <form id="cancel-withdrawal-form" action="{{ route('user.withdraw.cancel', $withdrawal->id) }}" method="POST" style="display: none;">
                                                @csrf @method('put')
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
                    <h4 class="text-success">No Pending Withdrawal Requests Available</h4>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="row no-gutters" id="completed-table">
            {{-- Completed Withdrawal Requests --}}
            @if($completed_requests->count())
                <div class="col-lg-12">
                    <h3 class="card-header">Completed Withdrawal Requests</h3>
                    <div class="table-responsive border-bottom">

                        <table class="table mb-0 thead-border-top-0">
                            <thead class="thead-inverse">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Bitcoin Address</th>
                                    <th scope="col">Request Date</th>
                                    <th scope="col">Withdrawal Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($completed_requests as $withdrawal)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-capitalize"><a class="text-dark" href="{{ route('admin.manage.users.view', $withdrawal->user->id) }}" target="_blank">{{ $withdrawal->user->first_name.' '.$withdrawal->user->last_name }}</a></td>
                                        <td class="text-capitalize">{{ $withdrawal->withdraw_method }}</td>
                                        <td>{{ config('app.currency').$withdrawal->amount }}</td>
                                        <td>{{ $withdrawal->bitcoin_address }}</td>
                                        <td>{{ $withdrawal->created_at }}</td>
                                        <td>{{ $withdrawal->updated_at }}</td>
                                        <td><div class="badge badge-success">{{ $withdrawal->status->title }}</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $completed_requests->links() }}
                    </div>
                </div>
            @else
                <div class="col-lg-12 card-body">
                    <h4 class="text-success">No Completed Withdrawal Requests</h4>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('input-js')
<script>
    function newWithdrawal(withdraw_id, user_id) {
        $.ajax({
            type: "PUT",
            data: {
                "_token": "{{ csrf_token() }}",
                "withdraw_id": withdraw_id,
                "reg_user_id": user_id
            },
            url: "{{ route('admin.withdraw') }}",
            success: function(response){
            alert(response.message)
                $("#completed-table").fadeOut(100, function() {
                        // form.html($response).fadeIn().delay(2000);
                        $("#completed-table").hide().load(location.href + " #completed-table>").fadeIn().delay(100);
                }).hide()
                $("#pending-table").fadeOut(100, function() {
                        // form.html($response).fadeIn().delay(2000);
                        $("#pending-table").hide().load(location.href + " #pending-table>").fadeIn().delay(100);
                }).hide()
            }
        });
    }
</script>
@endsection
