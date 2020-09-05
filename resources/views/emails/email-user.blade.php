@component('mail::message')
## Hi, this is <span style="color: blue">{{ $name }}</span> from RapidProfit

Dear {{ $user_firstname }},

{!! $message !!}

For any complaints please don't hesitate to contact us at {{ config('mail.from.address') }} or chat us with the live chat on our website.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
