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
    <!-- confrim page  -->
    <!-- ============================================================== -->
    <div class="auth-container">
        <div class="card auth">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 reset-email">
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
                            {{-- Website Title Heading  --}}
                            <a href="/"><img src="/images/logo.png" class="mb-4 d-md-none" width="200px" alt="{{ config('app.name') }}"></a>
                            <h2 class="auth-heading">Confirm Password</h2>
                            <p class="auth-subheading mb-5">Type in your email address and new password</p>

                            <h5>Please confirm your password before proceeding.</h5>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="col-md-12 auth-label col-form-label text-uppercase">Password</label>
                                    <input class="form-control auth-input @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn auth-button text-capitalize" style="color: white;">{{ __('Confirm Password') }}</button>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
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
    <!-- end confrim page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
