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
