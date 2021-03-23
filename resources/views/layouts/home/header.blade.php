<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                {{-- <img src="/home/assets/img/logo/loder.jpg" alt=""> --}}
                <img src="/favicon.png">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    {{-- <li>Phone: +99 (0) 101 0000 888</li> --}}
                                    <li>Email: {{ config('mail.from.address') }}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="{{ route('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ route('twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ route('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ route('telegram') }}" target="_blank"><i class="fab fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-4 col-lg-4">
                            <div class="logo text-uppercase">
                                <a href="{{ route('index') }}">
                                   <strong>{{ ucwords(config('app.name')) }}</strong>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('index') }}">Home</a></li>
                                            <li><a href="#about">About</a></li>
                                            <li><a href="{{ route('contact') }}">Contact</a></li>
                                            @if(!Auth::guard('web')->check())
                                                <li><a href="{{ route('login') }}">Login</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-right-btn d-none d-lg-block ml-20">
                                    @if(!Auth::guard('web')->check())
                                        <a href="{{ route('register') }}" class="btn header-btn">Register</a>
                                    @else
                                        <a href="@if(Auth::user()->role_id == role(config('roles.user'))){{ route('user.home') }}@else{{ route('admin.home') }}@endif" class="btn header-btn">Go to Dashboard</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
