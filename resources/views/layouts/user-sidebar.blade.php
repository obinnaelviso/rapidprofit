@section('home-link', route('index'))
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav flex-column">
        <li class="nav-item">
            <a class="nav-link @yield('home-active')" href="{{ route('user.home') }}">
                <span class="sidebar-icon sidebar-dashboard"></span> <span style="vertical-align: middle">Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('deposit-active')" href="{{ route('user.deposit') }}">
                <span class="sidebar-icon sidebar-deposit"></span> <span style="vertical-align: middle">Deposit</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('investments-active')" href="{{ route('user.investments') }}">
                <span class="sidebar-icon sidebar-investments"></span> <span style="vertical-align: middle">Start an Investment!</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('manage-investments-active')" href="{{ route('user.investments.manage') }}">
                <span class="sidebar-icon sidebar-manage-investments"></span> <span style="vertical-align: middle">Manage Investments</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('withdraw-active')" href="{{ route('user.withdraw') }}">
                <span class="sidebar-icon sidebar-withdraw"></span> <span style="vertical-align: middle">Withdraw</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('profile-active')" href="{{ route('user.profile') }}">
                <span class="sidebar-icon sidebar-profile"></span> <span style="vertical-align: middle">Profile</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <span class="sidebar-icon sidebar-logout"></span> <span style="vertical-align: middle">Log out</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
