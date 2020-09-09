<footer>
    <!--? Footer Start-->
    <div class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top footer-padding">
                <!-- footer Heading -->
                <div class="footer-heading">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>Do you have any issue?<br>Reach us on our live chat or send a support ticket!</h2>
                            </div>
                        </div>
                        {{-- <div class="col-xl-3 col-lg-4">
                            <span class="contact-number f-right">Call Us @ <br>+ 1 212-683-9756</span>
                        </div> --}}
                    </div>
                </div>
                <!-- Footer Menu -->
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Pages</h4>
                                <ul>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="mailto:{{ config('mail.from.address') }}">Contact Us</a></li>
                                    @if(!Auth::guard('web')->check())
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>How to Invest</h4>
                                <ul>
                                    <li><a href="{{ route('user.investments') }}">Make a Deposit</a></li>
                                    <li><a href="{{ route('user.investments') }}">Choose an Investment Plan</a></li>
                                    <li><a href="{{ route('user.investments') }}">Make payments</a></li>
                                    <li><a href="{{ route('user.investments') }}">Watch your money grow</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Legal</h4>
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li><a href="">Terms and Conditions</a></li>
                                    <li><a href="">Privacy Policy</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="{{ route('index') }}"><img src="{{ url('/images/logo.png') }}" width="200px" alt="">
                                </a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">Invest today and start earning from our No.1 fast growing investment platform. Rapidprofit is the best because you see what you invest grow live.</p>
                                </div>
                            </div>
                            <!-- Footer Social -->
                            <div class="footer-social ">
                                <a href="{{ route('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ route('twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{ route('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ route('telegram') }}" target="_blank"><i class="fab fa-telegram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12">
                        <div class="footer-copy-right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; {{ config('app.name') }} <script>document.write(new Date().getFullYear());</script> All rights reserved.
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

    <!-- JS here -->

    <script src="/home/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/home/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/home/assets/js/popper.min.js"></script>
    <script src="/home/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="/home/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/home/assets/js/owl.carousel.min.js"></script>
    <script src="/home/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="/home/assets/js/wow.min.js"></script>
    <script src="/home/assets/js/animated.headline.js"></script>
    <script src="/home/assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="/home/assets/js/jquery.nice-select.min.js"></script>
    <script src="/home/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    {{-- <script src="/home/assets/js/contact.js"></script> --}}
    <script src="/home/assets/js/jquery.form.js"></script>
    <script src="/home/assets/js/jquery.validate.min.js"></script>
    {{-- <script src="/home/assets/js/mail-script.js"></script> --}}
    <script src="/home/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="/home/assets/js/plugins.js"></script>
    <script src="/home/assets/js/main.js"></script>

    @yield('input-js')
