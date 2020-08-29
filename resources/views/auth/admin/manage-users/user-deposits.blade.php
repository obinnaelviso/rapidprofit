<div class="row text-center mb-3">
    <div class="col-md-12">
        <button class="btn btn-primary" onclick="newDeposit(0)"><i class="fa fa-plus" aria-hidden="true"></i> Add New Deposit</button>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover" id="deposit-table">
        <thead>
            <tr>
                @php $i = 1; @endphp
                <th scope="col">#</th>
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
            @foreach($receipts as $receipt)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td class="text-uppercase">{{ $receipt->payment_method }}</td>
                    <td>
                        @if($receipt->url)
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $receipt->bitcoin_address?:"N/A" }}</td>
                    <td class="text-success">+{{ config('app.currency').$receipt->amount }}</td>
                    <td>{{ config('app.currency').$receipt->deposit->prev_bal?: "N/A" }}</td>
                    <td>{{ config('app.currency').$receipt->deposit->new_bal?: "N/A" }}</td>
                    <td>{{ $receipt->created_at }}</td>
                    <td>
                        @if($receipt->status_id = status(config('status.completed')))
                            <div class="badge badge-success">{{ $receipt->status->title }}</div>
                        @else
                            <button class="btn btn-success btn-sm" onclick="newDeposit('{{ $receipt->id }}');">Confirm Deposit</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
