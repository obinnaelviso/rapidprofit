<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - {{ config('app.name') }}</title>
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
        height: 100%;
        background-color: black;
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
                    <div class="col-md-6 login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            {{-- Website Title Heading  --}}
                            <a href="/"><img src="/images/logo.png" class="mb-4 d-md-none" width="200px" alt="{{ config('app.name') }}"></a>
                            <h2 class="auth-heading">Sign in into your account!</h2>
                            <p class="auth-subheading mb-5">Sign in with your data used in registration</p>

                            @include('layouts.alerts')
                            <div class="form-group">
                                <label for="email" class="col-md-12 col-form-label auth-label text-capitalize">Email Address</label>
                                <input class="form-control auth-input form-control-lg" id="email" value="{{ old('email') }}" type="text" autocomplete="off" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-12 col-form-label auth-label text-capitalize">Password</label>
                                <input class="form-control auth-input form-control-lg" id="password" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label class="auth-label auth-radio-container">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="auth-radio"></span> Remember me
                                </label>
                                <label class="auth-label float-md-right">
                                    <a href="{{ route('password.request') }}">Forget Password?</a>
                                </label>
                            </div>
                            <button type="submit" class="btn auth-button mt-2">Sign in to Your Account</button>

                            <div class="auth-label">Don't have an account? <a href="{{ route('register') }}">Sign Up!</a></div>
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
