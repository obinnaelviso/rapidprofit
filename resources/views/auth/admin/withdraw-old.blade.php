@extends('layouts.main')
@section('title', 'My Dashboard - '.' Admin '.config('app.name'))
@section('withdrawals-active', 'active')
@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h1>Manage Withdrawals</h1>
        <hr>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12 mb-3" id="withdrawal-table">
        @if($pending_requests->count())
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title">Pending Withdrawal Requests</h4>
                    <div>
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    @php $i = 1; @endphp
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
                                        <th scope="row">{{ $i++ }}</th>
                                        <td class="text-capitalize"><a class="text-dark" href="{{ route('admin.manage.users.view', $withdrawal->user->id) }}" target="_blank">{{ $withdrawal->user->first_name.' '.$withdrawal->user->last_name }}</td></td>
                                        <td class="text-capitalize">{{ $withdrawal->withdraw_method }}</td>
                                        <td>{{ config('app.currency').$withdrawal->amount }}</td>
                                        <td>{{ $withdrawal->bitcoin_address }}</td>
                                        <td>{{ $withdrawal->created_at }}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm" onclick="newWithdrawal('{{ $withdrawal->id }}', {{ $withdrawal->user->id }})">Complete Withdrawal</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="card text-left">
              <div class="card-body">
                <h4 class="card-text text-success">No Pending Withdrawal Requests Available</h4>
              </div>
            </div>
        @endif
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12 mb-3" id="withdrawal-table">
        @if($completed_requests->count())
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title">Completed Withdrawal Requests</h4>
                    <div>
                        <table class="table table-striped table-inverse">
                            <thead class="thead-inverse">
                                <tr>
                                    @php $i = 1; @endphp
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
                                        <th scope="row">{{ $i++ }}</th>
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
            </div>
        @else
            <div class="card text-left">
              <div class="card-body">
                <h4 class="card-text text-success">No Withdrawal Requests Available</h4>
              </div>
            </div>
        @endif
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
                $("#withdrawal-table").fadeOut(200, function() {
                        // form.html($response).fadeIn().delay(2000);
                        $("#withdrawal-table").hide().load(location.href + " #withdraw-table").fadeIn().delay(200);
                }).hide()
            alert(response.message)
            }
        });
    }
</script>
@endsection
