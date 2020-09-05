<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                Copyright © 2020 {{ config('app.name') }}. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="{{ route('user.deposit') }}">Deposit</a>
                    <a href="{{ route('user.withdraw') }}">Withdraw</a>
                    <a href="{{ route('user.investments') }}">Invest</a>
                    <a href="{{ route('user.profile') }}">Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
