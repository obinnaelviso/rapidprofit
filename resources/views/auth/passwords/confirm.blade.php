<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Confirm Password - {{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/libs/css/style.css">
    <link rel="stylesheet" href="/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link href="/images/favicon.png" rel="icon" type="image/png"/>
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
    <!-- confrim page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="text-center"><a href="{{ route('index') }}"><img class="logo-img" src="/images/logo.png" width="200px" alt="logo"></a><span class="splash-description">Log in to your {{ config('app.name') }} account</span></div>
        <div class="card ">
            <h4 class="card-header text-center">Confirm Password</h4>
            <div class="card-body">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <h5>Please confirm your password before proceeding.</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password" class="col-md-12 col-form-label text-uppercase">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg btn-block text-capitalize" style="color: white;">{{ __('Confirm Password') }}</button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end confrim page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
