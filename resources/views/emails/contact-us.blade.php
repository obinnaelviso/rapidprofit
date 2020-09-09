@component('mail::message')
# You've just received a message from your contact form. Below are the details:

**Name** <br>
{{ $data['name'] }}

**Subject** <br>
{{ $data['subject'] }}

**Message**<br>
{{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
