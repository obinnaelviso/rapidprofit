<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Sidebar Brand -->
    <div id="sidebar-brand" class="themed-background">
        <a href="index.html" class="sidebar-title">
            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide">App<strong>UI</strong></span>
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
                    <a href="{{ route('user.home') }}"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                </li>
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
