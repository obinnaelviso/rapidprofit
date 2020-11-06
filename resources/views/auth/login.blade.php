<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - {{ config('app.name') }}</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
	<link href="/favicon.png" rel="icon" type="image/png"/>

    <!-- Simplebar -->
    <link type="text/css" href="/assets/vendor/simplebar.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="/assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="/assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="/assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">


</head>

<body class="layout-login">





    <div class="layout-login__overlay"></div>
    <div class="layout-login__form bg-white" data-simplebar>
        <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
            <a href="/" class="navbar-brand" style="min-width: 0">
                <img src="/images/logo-alt.png" width="200" alt="{{ config('app.name') }}">
            </a>
        </div>

        <h4 class="m-0">Welcome back!</h4>
        <p class="mb-5">Login to access your {{ config('app.name') }} Account </p>

        @include('layouts.alerts')

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="text-label" for="email_2">Email Address:</label>
                <div class="input-group input-group-merge">
                    <input id="email_2" value="{{ old('email') }}" type="text" autocomplete="off" name="email" class="form-control form-control-prepended @error('email') is-invalid @enderror" placeholder="john@doe.com" required>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="text-label" for="password_2">Password:</label>
                <div class="input-group input-group-merge">
                    <input id="password_2" type="password" name="password" class="form-control form-control-prepended @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Remember me</label>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary mb-2" type="submit">Login</button><br>
                <a href="{{ route('password.request') }}">Forgot password?</a> <br>
                Don't have an account? <a class="text-body text-underline" href="{{ route('register') }}">Sign up!</a>
            </div>
        </form>
    </div>


    <!-- jQuery -->
    <script src="/assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="/assets/vendor/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <script src="/assets/vendor/simplebar.min.js"></script>

    <!-- DOM Factory -->
    <script src="/assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="/assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="/assets/js/toggle-check-all.js"></script>
    <script src="/assets/js/check-selected-row.js"></script>
    <script src="/assets/js/dropdown.js"></script>
    <script src="/assets/js/sidebar-mini.js"></script>
    <script src="/assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="/assets/js/app-settings.js"></script>





</body>

</html>
