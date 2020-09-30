
    <!--begin footer -->
    <div class="footer">

        <!--begin container -->
        <div class="container">

            <!--begin row -->
            <div class="row">

                <!--begin col-md-12 -->
                <div class="col-md-12 text-center">

                    <!--begin copyright -->
                    <div class="copyright">
                        <a href="{{ route('index') }}" class="footer-logo"><img src="{{ url('/images/logo.png') }}" width="200px" alt="{{ config('app.name') }}"></a>
                        <p>
                            Copyright &copy; {{ config('app.name') }} <script>document.write(new Date().getFullYear());</script> All rights reserved.</p>
                            <p>Legal | <a href="/legal/stock-premium-terms-of-use.pdf">Terms And Conditions</a> | <a href="/legal/stock-premium-disclosure.pdf">Disclosure</a></p>

                    </div>
                    <!--end copyright -->

                    <!--begin footer_social -->
                    <ul class="footer_social">
                        <li>
                            <a href="{{ route('facebook') }}">
                                <i class="icon icon-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('twitter') }}">
                                <i class="icon icon-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('instagram') }}">
                                <i class="icon icon-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <!--end footer_social -->

                </div>
                <!--end col-md-6 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </div>
    <!--end footer -->


    <!-- Load JS here for greater good =============================-->
    <script src="/index/js/jquery-1.11.3.min.js"></script>
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/jquery.magnific-popup.min.js"></script>
    <script src="/index/js/jquery.nav.js"></script>
    <script src="/index/js/jquery.scrollTo-min.js"></script>
    <script src="/index/js/SmoothScroll.js"></script>
    <script src="/index/js/wow.js"></script>
    <script src="/index/js/custom.js"></script>
    <script src="/index/js/plugins.js"></script>
    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/home/assets/js/owl.carousel.min.js"></script>
    <script src="/home/assets/js/slick.min.js"></script>

    @yield('input-js')
    @include('layouts.tawk')
