@component('mail::message')
# Hi {{ ucfirst($user->first_name) }},

Your **{{ ucfirst($investment->package->name) }}** investment plan is complete and your **{{ config('app.name') }}** account has just been credited with **{{ config('app.currency').$investment->payout->amount }}**.

Your new balance is: **{{ config('app.currency').$user->wallet->amount }}**

Click on the button below for more information.

@component('mail::button', ['url' => route('user.home')])
Go to Dashboard >>
@endcomponent

Thanks,<br>
**{{ config('app.name') }}**
@endcomponent
