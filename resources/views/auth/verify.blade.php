<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verify Your Email Address - {{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/libs/css/style.css">
    <link rel="stylesheet" href="/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link href="/favicon.png" rel="icon" type="image/png"/>
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 100%), url(/home/assets/img/hero/services.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        padding-top: 3rem;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="text-center"><a href="{{ route('index') }}"><img class="logo-img" src="/images/logo.png" width="200px" alt="logo"></a><span class="splash-description">Log in to your {{ config('app.name') }} account</span></div>
        <div class="card ">
            <div class="card-body">
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ __('Before proceeding, please check your email for a verification link.') }}
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ __('If you did not receive the email.') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-dark btn-lg btn-block text-capitalize" style="color: white;">{{ __('click here to request another') }}</button>
                </form>
                <div class="text-center">
                    <a href="#" class="mt-3" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Log out >></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
