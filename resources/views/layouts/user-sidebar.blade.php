@section('home-link', route('user.home'))
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav flex-column">
        <li class="nav-item">
            <a class="nav-link @yield('home-active')" href="{{ route('user.home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('deposit-active')" href="{{ route('user.deposit') }}">Deposit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('investments-active')" href="{{ route('user.investments') }}">Start an Investment!</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('manage-investments-active')" href="{{ route('user.investments.manage') }}">Manage Investments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('withdraw-active')" href="{{ route('user.withdraw') }}">Withdraw</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @yield('profile-active')" href="{{ route('user.profile') }}">Profile</a>
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
