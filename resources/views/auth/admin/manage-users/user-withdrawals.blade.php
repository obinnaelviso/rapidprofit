@php
    $active_withdrawals = $withdrawals->where('status_id', status(config('status.pending')));
    $completed_withdrawals = $withdrawals->where('status_id', status(config('status.completed')));
@endphp
<h3>Withdrawal Requests</h3>
<div class="table-responsive mb-5">
    <table class="table table-hover" id="withdrawal-table">
        <thead>
            <tr>
                @php $i = 1; @endphp
                <th scope="col">#</th>
                <th scope="col">Method</th>
                <th scope="col">Amount</th>
                <th scope="col">Bitcoin Address</th>
                <th scope="col">Request Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($active_withdrawals as $withdrawal)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td class="text-capitalize">{{ $withdrawal->withdraw_method }}</td>
                    <td>{{ config('app.currency').$withdrawal->amount }}</td>
                    <td>{{ $withdrawal->bitcoin_address }}</td>
                    <td>{{ $withdrawal->created_at }}</td>
                    <td>
                        <button class="btn btn-success btn-sm" onclick="newWithdrawal('{{ $withdrawal->id }}');">Complete Withdrawal</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<h3>Completed Withdrawal Requests</h3>
<div class="table-responsive">
    <table class="table table-hover" id="withdrawal-comp-table">
        <thead>
            <tr>
                @php $i = 1; @endphp
                <th scope="col">#</th>
                <th scope="col">Method</th>
                <th scope="col">Amount</th>
                <th scope="col">Bitcoin Address</th>
                <th scope="col">Request Date</th>
                <th scope="col">Withdrawal Date</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withdrawals as $withdrawal)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
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
</div>
@section('input-js')
<script>
    $('#update-balance').click(function() {
        var amount = prompt('Enter New Balance', '')
        if(amount != null && amount !="") {
            $.ajax({
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "amount": amount
                },
                url: "{{ route('admin.manage.users.update-balance', $reg_user->id) }}",
                success: function(response){
                    $("#balance").fadeOut(200, function() {
                            // form.html($response).fadeIn().delay(2000);
                            $("#balance").hide().html("{{ config('app.currency') }}"+response.amount).fadeIn().delay(200);
                    }).hide()
                alert(response.message)
                }
            });
        }
    })

    $('#update-email').click(function() {
        var email = prompt('Enter New Email Address', '')
        if(email != null && email !="") {
            $.ajax({
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "email": email
                },
                url: "{{ route('admin.manage.users.update-email', $reg_user->id) }}",
                success: function(response){
                    $("#email").fadeOut(200, function() {
                            // form.html($response).fadeIn().delay(2000);
                            $("#email").hide().html(response.email).fadeIn().delay(200);
                    }).hide()
                alert(response.message)
                }
            });
        }
    })
    function newDeposit(receipt_id = 0) {
        var amount = prompt('Enter New Deposit', '')
        if(amount != null && amount !="") {
            $.ajax({
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "amount": amount,
                    "receipt_id": receipt_id
                },
                url: "{{ route('admin.manage.users.deposit', $reg_user->id) }}",
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
    function newWithdrawal(withdraw_id) {
        $.ajax({
            type: "PUT",
            data: {
                "_token": "{{ csrf_token() }}",
                "withdraw_id": withdraw_id
            },
            url: "{{ route('admin.manage.users.withdraw', $reg_user->id) }}",
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
