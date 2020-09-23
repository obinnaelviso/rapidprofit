<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>
            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                <a href="{{ route('user.profile') }}" class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="avatar mr-3">
                        <img src="/assets/images/avatar/avatar.svg" alt="avatar" class="avatar-img rounded-circle">
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong>{{ strtoupper(Auth::user()->first_name.' '.Auth::user()->last_name) }}</strong>
                    </span>
                </a>
                <div class="dropdown ml-auto">
                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-item-text dropdown-item-text--lh">
                            <div><strong>Adrian Demian</strong></div>
                            <div>@adriandemian</div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active" href="index.html">Dashboard</a>
                        <a class="dropdown-item" href="profile.html">My profile</a>
                        <a class="dropdown-item" href="edit-account.html">Edit account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
            <div class="sidebar-heading sidebar-m-t">MENU</div>
            @yield('sidebar')
        </div>
    </div>
</div>
