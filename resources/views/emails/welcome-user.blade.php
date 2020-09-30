@component('mail::message')
<img src="{{ url('/images/handshake.jpg') }}" alt="Handshake" title="Welcome to {{ config('app.name') }}">
<br><br>

# Hi {{ $user->first_name }},

Welcome to **{{ config('app.name') }}**, the No.1 top fastest earning investment platform. Are you looking for the highest returns on your investments? **{{ config('app.name') }}** - a fully automated online investment platform is a top secured and profitable option for you. Part of **{{ config('app.name') }}** – the team of professional traders focusing mainly on stock trading markets.

# How to get started?
* First of all you need to make deposit a into your **{{ config('app.name') }}** account using any payment method of your choice.

* Secondly, you select the investment package of your choice. We have a variety of investment packages so that you can choose the one that best suites your needs.

* After choosing your investment package, make the necessary payment and **start earning**.

* Watch as your money grow over the week and get your payouts as soon as you request for them.

It's as easy as anything you could ever think of. Click on the button below to get started!

@component('mail::button', ['url' => route('user.home')])
Go to Dashboard >
@endcomponent

# Why choose {{ config('app.name') }}?
* Our servers are secured with the best internet security to secure your data and prevent DDoS attacks or any malicious internet virus.
* We support a wide range of payment options.
* 24/7 live chat.
* Huge profit earnings.
* Quick withdrawals with a maximum of 1hr wait time.

# Still confused?
Send us a support ticket on our website or email us at **{{ config('mail.from.address') }}**. You can also chat with us on our live chat.

Thank you for choosing **{{ config('app.name') }}**.
@endcomponent
