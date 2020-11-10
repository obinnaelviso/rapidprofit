@component('mail::message')
# Hi {{ ucfirst($user->first_name) }},

Congratulations your profit has been rolled over to the next monthly fund as the time limit of withdrawal has been exceeded.<br>
Please ensure to choose an investment package. <br>
Below is your account summary for the month of {{ now()->subMonth()->monthName }}

**BALANCE:** {{ config('app.currency').$user->wallet->amount }}

**COMMISSIONS:** {{ config('app.currency').$user->wallet->commissions }}

Start an investment plan today to start earning. Click on the button below:

@component('mail::button', ['url' => route('user.investments')])
Go to Dashboard >>
@endcomponent

Thanks,<br>
**{{ config('app.name') }}**
@endcomponent
