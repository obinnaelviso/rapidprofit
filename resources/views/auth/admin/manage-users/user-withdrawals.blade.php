<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                @php $i = 1; @endphp
                <th scope="col">#</th>
                <th scope="col">Withdraw Method</th>
                <th scope="col">Amount</th>
                <th scope="col">Bitcoin Address</th>
                <th scope="col">Withdrawal Status</th>
                <th scope="col">Date/Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withdrawals as $withdrawal)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td class="text-capitalize">{{ $withdrawal->withdraw_method }}</td>
                    <td>{{ config('app.currency').$withdrawal->amount }}</td>
                    <td>{{ $withdrawal->bitcoin_address }}</td>
                    <td><div class="badge badge-warning">{{ $withdrawal->status->title }}</div></td>
                    <td>{{ $withdrawal->created_at }}</td>
                    <td>
                        <a class="btn btn-danger" href="#" onclick="event.preventDefault();
                        document.getElementById('cancel-withdrawal-form').submit();">Cancel</a>
                        <form id="cancel-withdrawal-form" action="{{ route('user.withdraw.cancel', $withdrawal->id) }}" method="POST" style="display: none;">
                            @csrf @method('put')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
