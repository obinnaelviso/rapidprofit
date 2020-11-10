@component('mail::message')
# Hi {{ ucfirst($user->first_name) }}

Congratulations. Your investment is up and running!

# Investment Summary
- - - - - - - - - - -
**Package Name:** {{ ucfirst($investment->package->name) }}

**Amount:** {{ config('app.currency').$investment->amount }}

**Percentage Profit:** {{ $investment->package->percentage }}%

**Payout:** {{ config('app.currency').$investment->payout->amount }}

<<<<<<< HEAD
=======
**Commission:** {{ config('app.currency').$investment->commission }}

>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
**Date:** {{ $investment->expiry_date->toFormattedDateString() }}

For more details, click the button below:

@component('mail::button', ['url' => route('user.investments.manage')])
Manage Investments >>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
