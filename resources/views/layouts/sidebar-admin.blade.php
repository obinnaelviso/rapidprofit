<div class="sidebar-block p-0">
    <ul class="sidebar-menu" id="components_menu">
        <li class="sidebar-menu-item @yield('home-active')">
            <a class="sidebar-menu-button" href="{{ route('admin.home') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">home</i>
                <span class="sidebar-menu-text">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('users-active')">
            <a class="sidebar-menu-button" href="{{ route('admin.manage.users') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-users"></i>
                <span class="sidebar-menu-text">Manage Users</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('packages-active')">
            <a class="sidebar-menu-button" href="{{ route('admin.packages') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-boxes"></i>
                <span class="sidebar-menu-text">Manage Packages</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('deposits-active')">
            <a class="sidebar-menu-button" href="{{ route('admin.deposit') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-wallet"></i>
                <span class="sidebar-menu-text">Manage Deposits</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('withdrawals-active')">
            <a class="sidebar-menu-button" href="{{ route('admin.withdraw') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-hand-holding-usd"></i>
                <span class="sidebar-menu-text">Manage Withdrawals</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('investments-active')">
            <a class="sidebar-menu-button" href="{{ route('admin.investments') }}">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-chart-line"></i>
                <span class="sidebar-menu-text">Manage Investments</span>
            </a>
        </li>
        <li class="sidebar-menu-item @yield('settings-active')">
            <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu" aria-expanded="true">
                <i class="sidebar-menu-icon sidebar-menu-icon--left fas fa-cogs"></i>
                <span class="sidebar-menu-text">Settings</span>
                <span class="ml-auto sidebar-menu-toggle-icon"></span>
            </a>
            <ul class="sidebar-submenu collapse show" id="dashboards_menu" style="">
                <li class="sidebar-menu-item @yield('general-active')">
                    <a class="sidebar-menu-button" href="{{ route('admin.settings') }}">
                        <span class="sidebar-menu-text">General</span>
                    </a>
                </li>
                <li class="sidebar-menu-item @yield('homepage-active')">
                    <a class="sidebar-menu-button" href="{{ route('admin.settings.homepage') }}">
                        <span class="sidebar-menu-text">Homepage</span>
                    </a>
                </li>
            </ul>
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
