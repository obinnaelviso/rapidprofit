<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>
            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                <a href="@if($user->role_id == role(config('roles.user'))){{ route('user.profile') }} @else javascript:void(0); @endif" class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="avatar mr-3">
                        <img src="/assets/images/avatar/avatar.svg" alt="avatar" class="avatar-img rounded-circle">
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong>{{ ucfirst(Auth::user()->first_name.' '.Auth::user()->last_name) }}</strong>
                    </span>
                </a>
                <div class="dropdown ml-auto">
                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-item-text dropdown-item-text--lh">
                            <div><strong>{{ ucfirst(Auth::user()->first_name.' '.Auth::user()->last_name) }}</strong></div>
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
                </div>
            </div>
            <div class="sidebar-heading sidebar-m-t">MENU</div>
            @yield('sidebar')
        </div>
    </div>
</div>
