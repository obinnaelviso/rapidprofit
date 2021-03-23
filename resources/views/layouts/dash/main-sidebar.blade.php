<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Sidebar Brand -->
    <div id="sidebar-brand" class="themed-background">
        <a href="/" class="sidebar-title">
            <img style="width: 20px" src="{{ asset('images/logo.png') }}"> <span class="sidebar-nav-mini-hide"><strong class="text-uppercase">{{config('app.name') }}</strong></span>
        </a>
    </div>
    <!-- END Sidebar Brand -->

    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li {!! (Request::is('*home') ? 'class="active"' : '') !!}>
                    <a href="{{ auth()->user()->isAdmin() ? route('admin.home') :route('user.home') }}"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                </li>
                @if(auth()->user()->isAdmin())
                    <li {!! (Request::is('*users') ? 'class="active"' : '') !!}>
                        <a href="{{ route('admin.manage.users') }}"><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Users</span></a>
                    </li>
                    <li {!! (Request::is('*packages') ? 'class="active"' : '') !!}>
                        <a href="{{ route('admin.packages') }}"><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Packages</span></a>
                    </li>
                    <li {!! (Request::is('*withdraw') ? 'class="active"' : '') !!}>
                        <a href="{{ route('admin.withdraw') }}"><i class="gi gi-bank sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Withdrawals</span></a>
                    </li>
                    <li {!! (Request::is('*deposit') ? 'class="active"' : '') !!}>
                        <a href="{{ route('admin.deposit') }}"><i class="gi gi-credit_card sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Deposits</span></a>
                    </li>
                    <li {!! (Request::is('*investments') ? 'class="active"' : '') !!}>
                        <a href="{{ route('admin.investments') }}"><i class="gi gi-pie_chart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Investments</span></a>
                    </li>
                    <li {!! (Request::is('*settings*') ? 'class="active"' : '') !!}>
                        <a href="#" class="sidebar-nav-menu {{ Request::is('*settings*') ? 'open' : '' }}">
                            <span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -90px; left: 52px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">
                                Settings
                            </span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('admin.settings') }}" {!! (Request::is('*general') ? 'class="active"' : '') !!}>General</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.settings.homepage') }}" {!! (Request::is('*homepage') ? 'class="active"' : '') !!}>Homepage</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li {!! (Request::is('*deposit') ? 'class="active"' : '') !!}>
                        <a href="{{ route('user.deposit') }}"><i class="gi gi-credit_card sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Make Deposit</span></a>
                    </li>
                    <li {!! (Request::is('*investments') ? 'class="active"' : '') !!}>
                        <a href="{{ route('user.investments') }}"><i class="hi hi-flash sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Start an Investment</span></a>
                    </li>
                    <li {!! (Request::is('*manage') ? 'class="active"' : '') !!}>
                        <a href="{{ route('user.investments.manage') }}"><i class="gi gi-pie_chart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Manage Investements</span></a>
                    </li>
                    <li {!! (Request::is('*withdraw') ? 'class="active"' : '') !!}>
                        <a href="{{ route('user.withdraw') }}"><i class="gi gi-bank sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Withdraw Funds</span></a>
                    </li>
                    <li {!! (Request::is('*profile') ? 'class="active"' : '') !!}>
                        <a href="{{ route('user.profile') }}"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Profile</span></a>
                    </li>
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off sidebar-nav-icon"></i> <span style="vertical-align: middle">Log out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->

    <!-- Sidebar Extra Info -->
    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
        <div class="text-center">
            <small>{{ date('Y') }} &copy; <a href="{{ config('app.url') }}">{{ config('app.name') }}</a></small>
        </div>
    </div>
    <!-- END Sidebar Extra Info -->
</div>
<!-- END Main Sidebar -->
