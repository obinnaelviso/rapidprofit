@component('mail::message')
# Hi {{ ucfirst($user->first_name) }},

Your **{{ config('app.name') }}** commissions has been cleared successfully.<br>
Below are the details of the transaction:

**PREV. COMMISSIONS:** {{ config('app.currency').$deposit->prev_bal }}

**AMOUNT:** {{ config('app.currency').$deposit->amount }}

**COMMISSIONS REMAINING:** {{ config('app.currency').$deposit->new_bal }}

Start an investment plan today to start earning. Click on the button below:

@component('mail::button', ['url' => route('user.investments')])
Go to Dashboard >>
@endcomponent

Thanks,<br>
**{{ config('app.name') }}**
@endcomponent
