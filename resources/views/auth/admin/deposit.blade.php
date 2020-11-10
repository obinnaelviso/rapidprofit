@extends('layouts.dashboard.main')
@section('title', 'Manage Deposits')
@section('deposits-active', 'active')
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
            <h1 class="m-0">Manage Deposits</h1>
        </div>
    </div>
</div>




<div class="container-fluid page__container">
    @include('layouts.alerts')
    <div class="card card-form">
        <div class="row no-gutters" id="deposit-table">

            @if($payment_receipts->count())
                <div class="col-lg-12">
                    <h3 class="card-header">New Payment Receipts</h3>
                    <div class="table-responsive border-bottom">

                        <table class="table mb-0 thead-border-top-0">
                            <thead class="thead-inverse">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Payment Type</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Receipt</th>
                                    <th scope="col">Bitcoin Address</th>
                                    <th scope="col">Amount ($)</th>
                                    <th scope="col">Prev. Bal</th>
                                    <th scope="col">New Bal</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payment_receipts->get() as $receipt)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-capitalize">{{ $receipt->user->first_name.' '.$receipt->user->last_name }}</td>
                                        <td class="text-uppercase">{{ $receipt->payment_type }}</td>
                                        <td class="text-uppercase">{{ $receipt->payment_method }}</td>
                                        <td>
                                            @if($receipt->url)
                                                <a href="{{ route('admin.manage.users.deposit.download-receipt', $receipt->id) }}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download </a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $receipt->bitcoin_address? :"N/A" }}</td>
                                        <td class="text-success">+{{ config('app.currency').$receipt->amount }}</td>
                                        <td>@if($receipt->deposit()->count()) {{ config('app.currency').$receipt->deposit->prev_bal }} @else N/A @endif</td>
                                        <td>@if($receipt->deposit()->count()) {{ config('app.currency').$receipt->deposit->new_bal }} @else N/A @endif</td>
                                        <td>{{ $receipt->created_at }}</td>
                                        <td>
                                            @if($receipt->status_id == status(config('status.completed')))
                                                <div class="badge badge-success">{{ $receipt->status->title }}</div>
                                            @else
                                                <button class="btn btn-warning btn-sm" onclick="newDeposit('{{ $receipt->id }}', {{ $receipt->user->id }});">Confirm Deposit</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="col-lg-12 card-body">
                    <h4 class="text-success">No Payment Receipts Available</h4>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('input-js')
<script>

    function newDeposit(receipt_id = 0, user_id) {
        var amount = prompt('Enter New Deposit', '')
        if(amount != null && amount !="") {
            $.ajax({
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "amount": amount,
                "receipt_id": receipt_id,
                    "reg_user_id": user_id
                },
                url: "{{ route('admin.deposit') }}",
                success: function(response){
                    $("#deposit-table").fadeOut(100, function() {
                            // form.html($response).fadeIn().delay(1000);
                            $("#deposit-table").hide().load(location.href + " #deposit-table>").fadeIn().delay(100);
                    }).hide()
                alert(response.message)
                }
            });
        }
    }

</script>
@endsection
