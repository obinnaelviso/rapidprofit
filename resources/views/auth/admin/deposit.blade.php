@extends('layouts.dash.main')
@section('title', 'Deposits')
@section('header-title', 'Manage User Deposit Requests')

@section('content')
<div class="row mb-3">
    <div class="col-md-12 mb-3" id="deposit-table">
        @if($payment_receipts->count())
            <div class="block full manage-investments">
                    <h4 class="card-header">New Payment Receipts</h4>
                <div class="card-body">
                    <div>
                        <table class="table table-vcenter table-hover table-borderless">
                            <thead class="thead-inverse">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
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
                                        <td class="text-uppercase">{{ $receipt->payment_method }}</td>
                                        <td>
                                            @if($receipt->url)
                                                <a href="{{ route('admin.manage.users.deposit.download-receipt', $receipt->id) }}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download </a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $receipt->bitcoin_address? :"N/A" }}</td>
                                        <td>@if($receipt->deposit()->count()) {{ config('app.currency').$receipt->deposit->prev_bal }} @else N/A @endif</td>
                                        <td>@if($receipt->deposit()->count()) {{ config('app.currency').$receipt->deposit->new_bal }} @else N/A @endif</td>
                                        <td>{{ $receipt->created_at }}</td>
                                        <td class="text-success">+{{ config('app.currency').$receipt->amount }}</td>
                                        <td>
                                            @if($receipt->status_id == status(config('status.completed')))
                                                <div class="label label-success">{{ $receipt->status->title }}</div>
                                            @else
                                                <button class="btn btn-success btn-sm" onclick="newDeposit('{{ $receipt->id }}', {{ $receipt->user->id }});">Confirm Deposit</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="block full text-left">
              <div class="card-body">
                <h4 class="card-text text-success">No Payment Receipts Available</h4>
              </div>
            </div>
        @endif
    </div>
</div>

@endsection
@push('more-js')
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
                    $("#deposit-table").fadeOut(200, function() {
                            // form.html($response).fadeIn().delay(2000);
                            $("#deposit-table").hide().load(location.href + " #deposit-table").fadeIn().delay(200);
                    }).hide()
                alert(response.message)
                }
            });
        }
    }

</script>
@endpush
