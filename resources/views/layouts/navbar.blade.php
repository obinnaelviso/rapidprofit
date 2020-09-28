<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg dashboard-bg fixed-top">
        <a class="navbar-brand" href="@yield('home-link')"><img src="{{ url('/images/logo.png') }}" width="200px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">

            @if(Auth::user()->role_id == role(config('roles.user')))
                <li class="nav-item balance-border mr-3">
                    Balance: {{ config('app.currency').$user->wallet->amount }}
                </li>
                <li class="nav-item bonus-border mr-5">
                    Bonus: {{ config('app.currency').$user->wallet->bonus }}
                </li>
            @endif
                <a href="@if(Auth::user()->role_id == role(config('roles.user'))) {{ route('user.profile') }} @else javascript::void(0) @endif"><li class="nav-item username mr-5">
                    <img src="{{ url('images/icons/profile-pic.svg') }}" class="mr-2" alt="user photo">
                    {{ Auth::user()->first_name.' '.Auth::user()->last_name }}
                </li></a>
                {{--<li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                        <li>
                            <div class="notification-title"> Notification</div>
                            <div class="notification-list">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        <div class="notification-info">
                                            <div class="notification-list-user-img"><img src="/assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                            <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                <div class="notification-date">2 min ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-footer"> <a href="#">View all notifications</a></div>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </nav>
</div>
