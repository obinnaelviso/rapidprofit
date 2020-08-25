{{-- <!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div> --}}

<!-- header section -->
<header class="header-section">
    <div class="container-fluid" style="padding: 0">
        <!-- widget prices -->
        <div style="background-color: #1D2330; overflow:hidden; box-sizing: border-box; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; padding:1px;padding: 0px; margin: 0px; width: 100%;"><div style="height:40px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=no" width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div></div>
        <div class="mobile-menu">
            <a href="/" class="site-logo text-uppercase" style="color: white; font-size: 28px; font-weight: 900;">7EVEN<span style="color: orange">TRADE</span>FX</a>
            <div class="nav-switch" style="z-index: 2000">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
</header>
<!-- header section end-->


<!-- Header section  -->
<nav class="nav-section">
    <div class="container">
        <ul class="main-menu">
            <!-- logo -->
            <a href="/" class="desktop-logo text-uppercase" style="color: white; font-size: 28px; font-weight: 900;">7EVEN<span style="color: orange">TRADE</span>FX</a>
            <!-- <li class="active"><a href="index.html">Home</a></li> -->
            <li><a href="/#start-trading">HOW TO START?</a></li>
            <li class="@yield('about-active')"><a href="{{ route('about') }}">ABOUT US</a></li>
            <li class="@yield('contact-active')"><a href="{{ route('contact_us') }}">CONTACT US</a></li>
            <li class="@yield('login-active')"><a href="{{ route('login') }}">LOGIN</a></li>
            <li class="@yield('register-active')"><a href="{{ route('register') }}">REGISTER</a></li>
        </ul>
    </div>
</nav>
<!-- Header section end -->
