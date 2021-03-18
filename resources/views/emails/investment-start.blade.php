@component('mail::message')
# Hi {{ ucfirst($user->first_name) }}

Congratulations. Your investment is up and running!

# Investment Summary
- - - - - - - - - - -
**Package Name:** {{ ucfirst($investment->package->name) }}

**Amount:** {{ config('app.currency').$investment->amount }}

**Percentage Profit:** {{ $investment->package->percentage }}%

**Payout:** {{ config('app.currency').$investment->payout->amount }}

**Date:** {{ $investment->expiry_date->toFormattedDateString() }}

For more details, click the button below:

@component('mail::button', ['url' => route('user.investments.manage')])
Manage Investments >>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
