<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/libs/css/style.css">
    <link rel="stylesheet" href="/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="text-center"><a href="../index.html"><img class="logo-img" src="/images/logo.png" alt="logo"></a><span class="splash-description">Log in to your barter account</span></div>
        <div class="card ">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @include('layouts.alerts')
                    <div class="form-group">
                        <label for="email" class="col-md-12 col-form-label text-uppercase">Email Address/Phone Number</label>
                        <input class="form-control form-control-lg" id="email" type="text" autocomplete="off" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-12 col-form-label text-uppercase">Password</label>
                        <input class="form-control form-control-lg" id="password" type="password" name="password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <a href="#">Forget Password?</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg btn-block" style="color: white">Log in</button>

                    <div class="text-center">Don't have an account? <a href="{{ route('register') }}">Register</a></div>
                </form>
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
