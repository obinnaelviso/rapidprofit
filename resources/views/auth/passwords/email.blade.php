<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password - {{ config('app.name') }}</title>
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
    <!-- reset page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="text-center"><a href="{{ route('index') }}"><img class="logo-img" src="/images/logo.png" width="200px" alt="logo"></a><span class="splash-description">Log in to your {{ config('app.name') }} account</span></div>
        <div class="card ">
            <h4 class="card-header text-center">Reset Password</h4>
            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email" class="col-md-12 col-form-label text-uppercase">Email Address</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="e.g johndoe@example.com" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn btn-dark btn-lg btn-block text-capitalize" style="color: white;">{{ __('Send Reset Link') }}</button>
                </form>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
</body>

</html>
