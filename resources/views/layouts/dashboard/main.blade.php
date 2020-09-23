<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('layouts.dashboard.head')

<body class="layout-default">













    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        @include('layouts.dashboard.header')

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">





                    @yield('content')



                </div>
                <!-- // END drawer-layout__content -->

                @include('layouts.dashboard.sidebar')
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <!-- App Settings FAB -->
    {{-- <div id="app-settings">
        <app-settings layout-active="default" :layout-location="{
      'default': 'index.html',
      'fixed': 'fixed-dashboard.html',
      'fluid': 'fluid-dashboard.html',
      'mini': 'mini-dashboard.html'
    }"></app-settings>
    </div> --}}

    @include('layouts.dashboard.footer')
</body>

</html>
