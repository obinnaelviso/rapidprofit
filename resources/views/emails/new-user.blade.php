@component('mail::message')


A New User Registered!
========================

Details
----------------
- - - - - - - - - - - - - - - -
**FIRST NAME:** {{ $user->first_name }}

**LAST NAME:** {{ $user->last_name }}

**EMAIL ADDRESS:** {{ $user->email }}

**BALANCE:** {{ config('app.currency').$user->wallet->amount }}

{{-- **REFERRAL BALANCE** {{ config('app.currency').$user->wallet->bonus }} --}}
**COUNTRY:** {{ $user->country }}

**ROLE:** <span style="color: blue; font-weight: 700;">{{ strtoupper($user->role->title) }}</span>

**ACCOUNT STATUS:** <span style="color: green; font-weight: 700"> {{ strtoupper($user->status->title) }}</span>

@component('mail::button', ['url' => route('admin.manage.users.view', $user->id)])
View More
@endcomponent
@endcomponent
