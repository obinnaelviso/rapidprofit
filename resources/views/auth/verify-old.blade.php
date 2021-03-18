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
        background-color: black;
        height: 100%;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="auth-container">
        <div class="card auth">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 verify">
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            {{-- Website Header --}}
                            <a href="/"><img src="/images/logo.png" class="mb-4 d-md-none" width="200px" alt="{{ config('app.name') }}"></a>
                            <h2 class="auth-heading">Verify your account!</h2>
                            <p class="auth-subheading mb-5">Check your email for verification link</p>

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
                            <button type="submit" class="btn auth-button mt-2 text-capitalize">{{ __('click here to request another') }}</button>
                        </form>
                    </div>
                    <div class="col-md-6 d-none d-sm-flex auth-bg">
                        <a href="/"><img src="/images/logo.png" alt="{{ config('app.name') }}"></a>
                    </div>
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
