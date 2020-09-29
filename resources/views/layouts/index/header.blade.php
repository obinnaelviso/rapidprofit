<!--begin loader -->
<div id="loader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--end loader -->

<!--begin header -->
<header class="header">

    <!--begin nav -->
    <nav class="navbar navbar-default navbar-fixed-top">

        <!--begin container -->
        <div class="container">

            <!--begin navbar -->
            <div class="navbar-header">
                <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <a href="{{ route('index') }}"><img src="{{ url('/images/logo-alt.png') }}" width="150px" alt="{{ config('app.name') }}">
                </a>
            </div>

            <div id="navbar-collapse-02" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="/#about">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    @if(!Auth::guard('web')->check())
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif


                    <li>@if(!Auth::guard('web')->check())
                        <a href="{{ route('register') }}" class="purchase scrool">Register</a>
                    @else
                        <a href="@if(Auth::user()->role_id == role(config('roles.user'))){{ route('user.home') }}@else{{ route('admin.home') }}@endif" class="purchase scrool">Dashboard</a>
                    @endif</li>
                </ul>
            </div>
            <!--end navbar -->

        </div>
        <!--end container -->

    </nav>
    <!--end nav -->

</header>
<!--end header -->
