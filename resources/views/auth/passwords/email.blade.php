
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password - {{ config('app.name') }}</title>

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
        <p class="mb-5">Reset Password </p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="e.g johndoe@example.com" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <button type="submit" class="btn btn-primary btn-lg btn-block text-capitalize">{{ __('Send Reset Link') }}</button>
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
