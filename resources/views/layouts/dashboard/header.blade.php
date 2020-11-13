<!-- Header -->

<div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
            <div class="container-fluid p-0">

                <!-- Navbar toggler -->

                <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- Navbar Brand -->
            <a href="/" class="navbar-brand ">
                    <img src="/images/logo.png" width="150" alt="{{ config('app.name') }}">
                </a>


                @if(Auth::user()->role_id == role(config('roles.user')))
                    <ul class="nav navbar-nav ml-auto d-none d-md-flex">
                        <li class="nav-item mr-3">
                            <div href="" class="btn btn-outline-info">
                                <i class="material-icons">monetization_on</i> Monthly Funds ({{ now()->monthName }}): {{ config('app.currency').$user->wallet->amount }}
                            </div>
                        </li>
                        {{-- <li class="nav-item mr-3">
                            <div class="btn btn-outline-warning">
                                <i class="fas fa-piggy-bank"></i> Commissions: {{ config('app.currency').$user->wallet->commissions }}
                            </div>
                        </li> --}}
                    </ul>
                @endif

                <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                    <li class="nav-item dropdown">
                        <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                            <span class="ml-1 d-flex-inline">
                                <span class="text-light">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</span>
                            </span>
                        </a>
                        <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item-text dropdown-item-text--lh">
                                <div><strong>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</strong></div>
                            </div>
                            <div class="dropdown-divider"></div>
                            @if($user->role_id == role(config('roles.user')))
                                <a class="dropdown-item @yield('home-active')" href="{{ route('user.home') }}">Dashboard</a>
                                <a class="dropdown-item @yield('manage-investments-active')" href="{{ route('user.investments.manage') }}">My Investments</a>
                                <a class="dropdown-item @yield('profile-active')" href="{{ route('user.profile') }}">My profile</a>
                            @else
                                <a class="dropdown-item @yield('home-active')" href="{{ route('admin.home') }}">Dashboard</a>
                                <a class="dropdown-item @yield('users-active')" href="{{ route('admin.manage.users') }}">Manage Users</a>
                                <a class="dropdown-item @yield('packages-active')" href="{{ route('admin.packages') }}">Manage Packages</a>
                                <a class="dropdown-item @yield('general-active')" href="{{ route('admin.settings') }}">Settings</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript::void(0)" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>

<!-- // END Header -->
