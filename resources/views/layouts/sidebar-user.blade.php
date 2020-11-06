<div class="sidebar-block p-0">
    <ul class="sidebar-menu" id="components_menu">
        <li class="sidebar-menu-item @yield('home-active')">
            <a class="sidebar-menu-button" href="{{ route('user.home') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">home</i>
                <span class="sidebar-menu-text">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('deposit-active')">
            <a class="sidebar-menu-button" href="{{ route('user.deposit') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-wallet"></i>
                <span class="sidebar-menu-text">Deposit</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('investments-active')">
            <a class="sidebar-menu-button" href="{{ route('user.investments') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-chart-line"></i>
                <span class="sidebar-menu-text">Start Investment</span>
                <span class="badge badge-warning ml-auto">START EARNING!!!</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('manage-investments-active')">
            <a class="sidebar-menu-button" href="{{ route('user.investments.manage') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-coins"></i>
                <span class="sidebar-menu-text">Manage Investments</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('withdraw-active')">
            <a class="sidebar-menu-button" href="{{ route('user.withdraw') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-hand-holding-usd"></i>
                <span class="sidebar-menu-text">Withdraw</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('profile-active')">
            <a class="sidebar-menu-button" href="{{ route('user.profile') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_circle</i>
                <span class="sidebar-menu-text">Profile</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="javascript::void(0)" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-sign-out-alt"></i>
                <span class="sidebar-menu-text">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
