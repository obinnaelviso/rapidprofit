@php
    $active_investments = $investments->where('status_id', status(config('status.active')));
    $completed_investments = $investments->where('status_id', status(config('status.completed')));
@endphp

<h3>Active Investments</h3>
<div class="table-responsive mb-5">
    <table class="table table-borderless">
        <thead>
            <tr>
                @php $i = 1; @endphp
                <th scope="col">#</th>
                <th scope="col">Package Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Duration</th>
                <th scope="col">Profit-Per-Week</th>
                <th scope="col">Total Payout</th>
                <th scope="col">Start Date</th>
                <th scope="col">Due Date</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($active_investments as $investment)
                <tr>
                    @php
                        $investment_return = calculateInvestmentReturn($investment->amount, $investment->package->percentage, $investment->package->duration);
                    @endphp
                    <th scope="row">{{ $i++ }}</th>
                    <td class="text-capitalize">{{ $investment->package->name }}</td>
                    <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                    <td>@if($investment->package->duration == 7) 1 week @else 1 month @endif</td>
                    <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                    <td class="text-success">{{ config('app.currency').$investment_return[1] }}</td>
                    <td>{{ $investment->created_at->toFormattedDateString() }}</td>
                    <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                    <td><span class="label label-primary"> {{ $investment->status->title }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<h3 class="mt-5">Completed Investments</h3>
<div class="table-responsive">
    <table class="table table-borderless">
        <thead>
            <tr>
                @php $i = 1; @endphp
                <th scope="col">#</th>
                <th scope="col">Package Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Duration</th>
                <th scope="col">Profit-Per-Week</th>
                <th scope="col">Total Payout</th>
                <th scope="col">Start Date</th>
                <th scope="col">Due Date</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($completed_investments as $investment)
                <tr>
                    @php
                        $investment_return = calculateInvestmentReturn($investment->amount, $investment->package->percentage, $investment->package->duration);
                    @endphp
                    <th scope="row">{{ $i++ }}</th>
                    <td class="text-capitalize">{{ $investment->package->name }}</td>
                    <td class="text-danger">{{ config('app.currency').$investment->amount }}</td>
                    <td>@if($investment->package->duration == 7) 1 week @else 1 month @endif</td>
                    <td class="text-success">+{{ config('app.currency').$investment_return[0] }}</td>
                    <td class="text-success">{{ config('app.currency').$investment_return[1] }}</td>
                    <td>{{ $investment->created_at->toFormattedDateString() }}</td>
                    <td class="text-danger">{{ $investment->expiry_date->toFormattedDateString() }}</td>
                    <td><span class="label label-success"> {{ $investment->status->title }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
