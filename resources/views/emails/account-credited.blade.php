@component('mail::message')
# Hi {{ ucfirst($user->wallet->amount) }},

Your **{{ config('app.name') }}** account has been successfully credited.<br>
Below are the details of the transaction:

**PREV. BALANCE:** {{ config('app.currency').$deposit->prev_bal }}

**AMOUNT:** {{ config('app.currency').$deposit->amount }}

**NEW BALANCE:** {{ config('app.currency').$deposit->new_bal }}

Now you can start investing and earning. Click on the button below:

@component('mail::button', ['url' => route('user.investments')])
Go to Dashboard >>
@endcomponent

Thanks,<br>
**{{ config('app.name') }}**
@endcomponent
