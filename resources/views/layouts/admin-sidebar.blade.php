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
            <a class="nav-link @yield('withdrawals-active')" href="#">Manage Withdrawals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('deposits-active')" href="#">Manage Deposits</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('investments-active')" href="#">Manage Investments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('settings-active')" href="#">Settings</a>
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
