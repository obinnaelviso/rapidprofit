@section('home-link', route('admin.home'))
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav flex-column">
        <li class="nav-item">
            <a class="nav-link @yield('home-active')" href="{{ route('admin.home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('users-active')" href="{{ route('admin.manage.users') }}">Manage Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('packages-active')" href="{{ route('admin.packages') }}">Manage Packages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('withdrawals-active')" href="{{ route('admin.withdraw') }}">Manage Withdrawals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('deposits-active')" href="{{ route('admin.deposit') }}">Manage Deposits</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('investments-active')" href="{{ route('admin.investments') }}">Manage Investments</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link @yield('settings-active')" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">
              Settings
            </a>
            <div id="submenu-1" class="collapse submenu" style="">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @yield('general-active')" href="{{ route('admin.settings') }}">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('homepage-active')" href="{{ route('admin.settings.homepage') }}">Homepage</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Log out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
