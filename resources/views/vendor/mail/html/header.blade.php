<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
{{-- {{ $slot }} --}}
<img src="{{ url('/images/logo.png') }}" width="80px" alt="{{ config('app.name') }}"> <h1>{{ config('app.name') }}</h1>
@endif
</a>
</td>
</tr>
