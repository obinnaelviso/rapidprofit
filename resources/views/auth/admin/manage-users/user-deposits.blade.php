<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                @php $i = 1; @endphp
                <th scope="col">#</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Receipt</th>
                <th scope="col">Bitcoin Address</th>
                <th scope="col">Amount in USD</th>
                <th scope="col">Date/Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deposits as $deposit)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td class="text-uppercase">{{ $deposit->payment_method }}</td>
                    <td></td>
                    <td>{{ $deposit->bitcoin_address?:"N/A" }}</td>
                    <td><div class="badge badge-warning">{{ config('app.currency').$deposit->amount }}</div></td>
                    <td>{{ $deposit->created_at }}</td>
                    <td>
                        <a class="btn btn-danger" href="#" onclick="event.preventDefault();
                        document.getElementById('cancel-withdrawal-form').submit();">Cancel</a>
                        {{-- <form id="cancel-withdrawal-form" action="{{ route('user.withdraw.cancel', $withdrawal->id) }}" method="POST" style="display: none;">
                            @csrf @method('put')
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
