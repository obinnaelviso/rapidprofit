@extends('layouts.index.main')
@section('title', 'Welcome to '.config('app.name').' - Your No. 1 Investment Platform')
@section('content')

    <!--begin home_wrapper -->
    <section id="home_wrapper" class="home-wrapper">

        <!--begin gradient_overlay -->
        <div class="gradient_overlay"></div>
        <!--end gradient_overlay -->

        <!--begin container-->
        <div class="container home-wrappe-inside">

            <!--begin row-->
            <div class="row margin-bottom-30">

                <!--begin col-md-6-->
                <div class="col-md-6 padding-top-20">

                    <h1 class="home-title wow fadeIn margin-bottom-100" data-wow-delay="0.5s">Welcome to the Fastest Growing Stock Trading Investment Platform</h1>

                    {{-- <p class="home-subtitle wow fadeIn" data-wow-delay="1s">
                        Design &amp; style should always work toward making you look<br>
                        good &amp; feel good - without a lot of efforts - so you can<br>
                        always get on with the things that truly matter.
                    </p> --}}

                    <a href="{{ route('register') }}" class="btn btn-lg btn-blue scrool wow fadeIn" data-wow-delay="1.5s">Register Today!</a>

                </div>
                <!--end col-md-6-->

                <!--begin col-md-6-->
                {{-- <div class="col-md-6 wow slideInRight" data-wow-delay="2s">

                    <iframe src="http://player.vimeo.com/video/69988283?color=fe403a&amp;title=0&amp;byline=0&amp;portrait=0" width="555" height="321" class="frame-border"></iframe>

                </div> --}}
                <!--end col-md-6-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end home_wrapper -->

    <!--begin services-->
    <section id="services">

        <!--begin section-grey-->
        <div class="services-wrapper small-padding-bottom">
            <!--begin container-->
            <div class="container">

                  <!--begin row-->
                  <div class="row margin-bottom-30">

                      <!--begin col-md-12-->
                      <div class="col-md-12 text-center">
                          <h2 class="section-title text-gold text-uppercase">WHY CHOOSE {{ config('app.name') }}</h2>

                          <div class="separator_wrapper">
                              <i class="icon icon-star-two red"></i>
                          </div>

                          {{-- <p class="section-subtitle text-white">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p> --}}
                      </div>

                  </div>
                  <!--end row-->

                  <!--begin row-->
                  <div class="row">

                      <!--begin col-md-4-->
                      <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.15s">

                          <!--begin popup image -->
                          <div class="services-icon">
                              <i class="icon icon-certificate"></i>
                          </div>
                          <!--end popup image -->

                          <!--begin service-inner-->
                          <div class="services-text">
                              <h4>LEGAL DOCUMENTATION</h4>
                              <p>We are a legal company possessing a legal documentation and proper authorization in providing its services to all members..</p>
                          </div>
                          <!--end service-inner-->

                      </div>
                      <!--end col-md-4-->

                      <!--begin col-md-4-->
                      <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.3s">

                          <!--begin popup image -->
                          <div class="services-icon">
                              <i class="icon icon-money-banknote"></i>
                          </div>
                          <!--end popup image -->

                          <!--begin service-inner-->
                          <div class="services-text">
                              <h4>INSTANT WITHDRAWALS</h4>
                              <p>Get your payment instantly as soon as you request it with a 1hr maximum wait time! There is no withdrawal fee attached, you get what you request for.</p>
                          </div>
                          <!--end service-inner-->

                      </div>
                      <!--end col-md-4-->

                      <!--begin col-md-4-->
                      <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.45s">

                          <!--begin popup image -->
                          <div class="services-icon">
                              <i class="icon icon-lock"></i>
                          </div>
                          <!--end popup image -->

                          <!--begin service-inner-->
                          <div class="services-text">
                              <h4>SECURE PAYMENT</h4>
                              <p>All our payment methods are totally secured with the best algorithms to ensure p2p exchange.</p>
                          </div>
                          <!--end service-inner-->

                      </div>
                      <!--end col-md-4-->
                      <div class="clearfix"></div>
                      <!--begin col-md-4-->
                      <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.6s">

                          <!--begin popup image -->
                          <div class="services-icon">
                              <i class="icon icon-present-gift"></i>
                          </div>
                          <!--end popup image -->

                          <!--begin service-inner-->
                          <div class="services-text">
                              <h4>MULTIPLE BONUSES</h4>
                              <p class="text-white">Unlock more bonuses as you transition from one investment package to the other. The higher you go, the more your bonus.</p>
                            </div>
                          <!--end service-inner-->

                      </div>
                      <!--end col-md-4-->

                      <!--begin col-md-4-->
                      <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.75s">

                          <!--begin popup image -->
                          <div class="services-icon">
                              <i class="icon icon-user"></i>
                          </div>
                          <!--end popup image -->

                          <!--begin service-inner-->
                          <div class="services-text">
                              <h4>PROFESSIONAL TEAMS</h4>
                              <p>Our Portfolio is diversified and taken care of by the most skilled stock analyst and traders.</p>
                          </div>
                          <!--end service-inner-->

                      </div>
                      <!--end col-md-4-->

                      <!--begin col-md-4-->
                      <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.9s">

                          <!--begin popup image -->
                          <div class="services-icon">
                              <i class="icon icon-speech-streamline-talk-user"></i>
                          </div>
                          <!--end popup image -->

                          <!--begin service-inner-->
                          <div class="services-text">
                              <h4>24/7 CUSTOMER SUPPORT</h4>
                              <p class="text-white">Our customer support are available 24 hours a day and 7 days a week to attend to all your queries and reqeusts through our live chat or support ticket.</p>
                            </div>
                          <!--end service-inner-->

                      </div>
                      <!--end col-md-4-->

                  </div>
                  <!--end row-->

            </div>
            <!--end container-->

        </div>
        <!--end section-grey-->

    </section>
      <!--end services-->
    <!--begin section-grey -->
    <section class="section-grey" id="about">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-6-->
                <div class="col-md-6">

                    {{-- <img src="http://placehold.it/800x660" class="width-100" alt="imac"> --}}
                    <img src="/images/hero/our-staffs.jpg" class="width-100" alt="{{ config('app.name') }}">

                </div>
                <!--end col-sm-6-->

                <!--begin col-md-6-->
                <div class="col-md-6 margin-top-10 margin-bottom-30">

                    <h3 class="medium-title">
                        <small>WE ARE THE BEST</small><br>
                        No. 1 Fastest Growing Stock Trading Investment Company In The World
                    </h3>

                    <p>{{ config('app.name') }} we trade both currency pairs and commodities in the live market five(5) days a week with our group of experienced traders and market analysts in order to maximize our investors profit. After years of professional trading.</p>
                    <p>Having all the necessary features for professionals, our trading platform is easily accessible even for newcomers!</p>

                    {{-- <ul class="features-list-dark">
                        <li><i class="icon icon-check-mark blue"></i> Netsum est, qui ipsum quiaim netsum sequi net tempor.</li>
                        <li><i class="icon icon-check-mark blue"></i> Etiam tempor ante acu ipsum finibus, atimus urnas.</li>
                        <li><i class="icon icon-check-mark blue"></i> Atimus urnas netsudat, qui ipsum quiaim netsum.</li>
                        <li><i class="icon icon-check-mark blue"></i> Etiam tempor ante acum ipsum et finibus.</li>
                    </ul> --}}

                    <a href="{{ route('register') }}" class="btn btn-lg btn-blue small">Find Out More</a>

                </div>
                <!--end col-sm-6-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end section-grey-->

    <!--begin fun-facts -->
    <div class="fun-facts-wrapper">

        <!--begin image-overlay -->
        <!--end image-overlay -->

        <!--begin container-->
        @php
            $active_investors = array_key_exists('active_investors', $homepage) ? $homepage->active_investors: "N/A";
            $active_invest = array_key_exists('active_invest', $homepage) ? $homepage->active_invest: "N/A";
            $average_dep = array_key_exists('average_dep', $homepage) ? $homepage->average_dep: "N/A";
            $average_pay = array_key_exists('average_pay', $homepage) ? $homepage->average_pay: "N/A";
            // $active_investors = "N/A";
            // $active_invest = "N/A";
            // $average_dep = "N/A";
            // $average_pay = "N/A";
        @endphp
        <div class="container fun-facts-inside">

            <!--begin row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-tittle section-tittle2 text-center mb-25">
                        <h2 class="text-uppercase text-gold shadow-5">{{ config('app.name') }} ACHIEVEMENTS</h2>

                        <div class="separator_wrapper">
                            <i class="icon icon-star-two red"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h2 class="fa fa-users"></h2>
                        <br>
                        <h2 class="card-title" id="active-investors">{{ $active_investors }}</h2>
                        <h5 class="card-text">Active Investors</h5>
                        <br>
                      </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h2 class="fa fa-money-bill-alt text-success"></h2>
                        <br>
                        <h2 class="card-title" id="active-invest">{{ $active_invest }}</h2>
                        <h5 class="card-text">Active Investments</h5>
                        <br>
                      </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h2 class="fa fa-arrow-down text-danger"></h2>
                        <br>
                        <h2 class="card-title" id="average-dep">{{ $average_dep }}</h2>
                        <h5 class="card-text">Average Deposit Per Month</h5>
                        <br>
                      </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h2 class="fa fa-arrow-up text-success"></h2>
                        <br>
                        <h2 class="card-title" id="average-pay">{{ $average_pay }}</h2>
                        <h5 class="card-text">Average Payouts Per Month</h5>
                        <br>
                      </div>
                    </div>
                </div>
            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </div>
    <!--end fun-facts -->

    <!--begin portfolio -->
    <section class="section-white portfolio-padding" id="portfolio">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row margin-bottom-50">

                <!--begin col-md-12-->
                <div class="col-md-12 text-center">
                    <h2 class="section-title">Traded Stocks</h2>

                    <div class="separator_wrapper">
                        <i class="icon icon-star-two blue"></i>
                    </div>

                    <p class="section-subtitle">Below are a rundown of {{ config('app.name') }}'s traded stocks in the market.</p>
                </div>
                <!--end col-md-12-->

            </div>
            <!--end row-->

            <!--begin row-->
            <div class="row text-center">
                <div class="col-md-3 margin-bottom-30 col-6">
                    <img src="/images/stocks/adidas.svg" alt="adidas" class="img-fluid" width="100">
                </div>
                <div class="col-md-3 margin-bottom-30 col-6">
                    <img src="/images/stocks/amazon.svg.png" alt="amazon" class="img-fluid pt-5" width="170">
                </div>
                <div class="col-md-3 margin-bottom-30 col-6">
                    <img src="/images/stocks/amd.svg" alt="amd" class="img-fluid" width="100">
                </div>
                <div class="col-md-3 margin-bottom-30 col-6">
                    <img src="/images/stocks/apple.svg" alt="apple" class="img-fluid" width="100">
                </div>
                <div class="col-md-3 margin-bottom-30 col-6">
                    <img src="/images/stocks/facebook.svg" alt="facebook" class="img-fluid" width="100">
                </div>
                <div class="col-md-3 margin-bottom-30 col-6">
                    <img src="/images/stocks/netflix.svg" alt="netflix" class="img-fluid" width="100">
                </div>
                <div class="col-md-3 margin-bottom-30 col-6">
                    <img src="/images/stocks/nike.svg" alt="nike" class="img-fluid" width="100">
                </div>
                <div class="col-md-3 margin-bottom-30 col-6">
                    <img src="/images/stocks/tesla.svg" alt="tesla" class="img-fluid" width="100">
                </div>
            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end portfolio-->

    <!--begin image-section -->
    {{-- <section class="image-section">

        <!--begin image-overlay -->
        <div class="image-overlay"></div>
        <!--end image-overlay -->

        <!--begin container-->
        <div class="container image-section-inside">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-6-->
                <div class="col-md-10 col-md-offset-1 text-center margin-top-110 margin-bottom-140">

                    <h2 class="large-title white">Seen enough? Let's get started.</h2>

                    <p class="section-subtitle white">No Fixed Contract. No Installation Required. Trusted &amp; Secure.</p>

                    <a href="#pricing" class="btn btn-lg btn-blue margin-top-20 scrool">TRY IT FOR FREE!</a>

                </div>
                <!--end col-md-6-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section> --}}
    <!--end image-section -->

    <!--begin testimonials -->
    <div class="section-testimonials">

        <!--begin container-->
        <div class="container testimonials-wrapper">

            <!--begin row-->
<<<<<<< HEAD
            <div class="row">

                <!--begin col-sm-5 -->
                <div class="col-sm-5">

                    <!--begin testimonials-info-->
                    <div class="testimonials-info">

                        <p class="author-name">Zurich Chamberlain<br><span>CEO P & P Farms</span></p>

                    </div>
                    <!--end testimonials-info-->

                </div>
                <!--end col-sm-5 -->

                <!--begin col-sm-7 -->
                <div class="col-sm-7">

                    <p class="testimonials-text">"It only get's better with {{ config('app.name') }}. I just keep investing and investing and investing, and my funds keep growing, growing and growing."</p>

                </div>
                <!--end col-sm-7 -->

            </div>
            <!--end row-->
=======
            <div class="owl-carousel owl-theme" id="testimony">
                <div class="row">

                    <!--begin col-sm-5 -->
                    <div class="col-sm-5">

                        <!--begin testimonials-info-->

                        <div class="testimonials-info">

                            <p class="author-name">Zurich Chamberlain<br><span>CEO P & P Farms</span></p>

                        </div>
                        <!--end testimonials-info-->

                    </div>
                    <!--end col-sm-5 -->

                    <!--begin col-sm-7 -->
                    <div class="col-sm-7">

                        <p class="testimonials-text">"It only get's better with {{ config('app.name') }}. I just keep investing and investing and investing, and my funds keep growing, growing and growing."</p>

                    </div>
                    <!--end col-sm-7 -->

                </div>
                <div class="row">

                    <!--begin col-sm-5 -->
                    <div class="col-sm-5">

                        <!--begin testimonials-info-->

                        <div class="testimonials-info">

                            <p class="author-name">Dr. Jose Ramirez</p>

                        </div>
                        <!--end testimonials-info-->

                    </div>
                    <!--end col-sm-5 -->

                    <!--begin col-sm-7 -->
                    <div class="col-sm-7">

                        <p class="testimonials-text">"An enthralling journey into wealth creation"</p>

                    </div>
                    <!--end col-sm-7 -->

                </div>
                <div class="row">

                    <!--begin col-sm-5 -->
                    <div class="col-sm-5">

                        <!--begin testimonials-info-->

                        <div class="testimonials-info">

                            <p class="author-name">Jo Benton<br><span>Head of Marketing and PR at Saxo Markets</span></p>

                        </div>
                        <!--end testimonials-info-->

                    </div>
                    <!--end col-sm-5 -->

                    <!--begin col-sm-7 -->
                    <div class="col-sm-7">

                        <p class="testimonials-text">"took me by surprise, a secure rarity"</p>

                    </div>
                    <!--end col-sm-7 -->

                </div>
                <!--end row-->
                <div class="row">

                    <!--begin col-sm-5 -->
                    <div class="col-sm-5">

                        <!--begin testimonials-info-->

                        <div class="testimonials-info">

                            <p class="author-name">Georgios Kalpaxidis<br><span>Business Developer/Trading Assistant at DEGIRO</span></p>

                        </div>
                        <!--end testimonials-info-->

                    </div>
                    <!--end col-sm-5 -->

                    <!--begin col-sm-7 -->
                    <div class="col-sm-7">

                        <p class="testimonials-text">"{{ config('app.name') }} is a Global Stocks Almagamation!"</p>

                    </div>
                    <!--end col-sm-7 -->

                </div>
            </div>
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc

        </div>
        <!--end container-->

    </div>
    <!--end testimonials-->

    <!--begin col-md-4 -->
    <section class="section-white" id="pricing">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-12-->
                <div class="col-md-12 text-center">
                    <h2 class="section-title">Choose Your Investment Package</h2>

                    <div class="separator_wrapper">
                        <i class="icon icon-star-two red"></i>
                    </div>

                    <p class="section-subtitle">{{ config('app.name') }} presents you with the most comfortable investment environment. <br>{{ config('app.name') }} focuses mainly on stock trading, especially types of stock trade systems such as Lending and Leverage trading. <br>The portfolio will be taken care of by the right minds and skills and don't worry. We've got you covered!</p>
                </div>
                <!--end col-md-12-->

            </div>
            <!--end row-->

            <!--begin row-->
            {{-- <div class="row">

                <!--begin col-sm-4 -->
                <div class="col-sm-4">

                    <!--begin pricing-box -->
                    <div class="pricing-box">

                        <!--begin pricing-top -->
                        <div class="pricing-top">

                            <h3>Starter</h3>

                            <p class="price"><span class="number white">99%</span> <span class="month white">/month</span></p>

                        </div>
                        <!--end pricing-top -->

                        <!--begin pricing-bottom -->
                        <div class="pricing-bottom">

                            <ul>
                                <li>1 GB of space</li>
                                <li>200 messages</li>
                                <li>unlimited updates</li>
                                <li>1 user acounts</li>
                                <li>2 databases</li>
                            </ul>

                            <a href="" class="btn btn-md btn-block btn-pricing-blue">REGISTER TODAY</a>

                        </div>
                        <!--end pricing-bottom -->

                    </div>
                    <!--end pricing-box -->

                </div>
                <!--end col-sm-4 -->

            </div> --}}
            <!--end row-->

            <!--begin row-->
            {{-- <div class="row">

                <!--begin col-md-12-->
                <div class="col-md-12 text-center">
                    <p>*With more than <span class="bold">25078 clients</span>, we aim to offer premium <span class="bold">marketing solutions</span> for your business.</p>
                </div>
                <!--end col-md-12-->

            </div> --}}
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end section-white-->

    <section class="pricing" style="padding-top:6em; padding-bottom: 6em;">
        <div class="container">
          <div class="row">
            <!-- Free Tier -->
            @foreach($packages as $package)
                <div class="col-md-4 mb-5">
                    <div class="card mb-lg-0" title="jdkajdkl">
                        <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">{{ $package->name }}</h5>
                        <h6 class="card-price text-center">{{ $package->percentage }}%<span class="period">/week</span></h6>
                        <hr>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Minimum amount: ${{ $package->min_amount }}</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Maximum amount: ${{ $package->max_amount }}</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Duration: {{ ($package->duration == 7)?"1 Week":"1 Month" }}</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>{{ ($package->gift_bonus == 0)?"No Gift Bonus":config('app.currency').$package->gift_bonus." Gift Bonus" }}</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Payout: Profit accumulated + Capital included + Gift Bonus</li>
                        </ul>
                        <a href="{{ route('login') }}" class="btn btn-block btn-primary text-uppercase">Invest & Start Earning</a>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
    </section>


    <!--begin section-grey-->
    <div class="section-grey sponsors-padding">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row text-center">

                <!--begin col-sm-12-->
                <div class="col-sm-12 sponsors">
                    <h1>Our Affiliates</h1>
<<<<<<< HEAD
                    <div class="owl-carousel owl-theme">
=======
                    <div class="owl-carousel owl-theme" id="affiliates">
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
                        <img src="/images/affiliates/360.jpg" alt="360">
                        <img src="/images/affiliates/adara.png" alt="adara">
                        <img src="/images/affiliates/artis.png" alt="artis">
                        <img src="/images/affiliates/bar.png" alt="bar">
                        <img src="/images/affiliates/bg.jpg" alt="bg">
                        <img src="/images/affiliates/black.jpg" alt="black">
                        <img src="/images/affiliates/Brunel.jpg" alt="Brunel">
                        <img src="/images/affiliates/cognitive.png" alt="cognitive">
                        <img src="/images/affiliates/confux.jpg" alt="confux">
                        <img src="/images/affiliates/cook.jpg" alt="cook">
                        <img src="/images/affiliates/ela.png" alt="ela">
                        <img src="/images/affiliates/elgin.jpg" alt="elgin">
                        <img src="/images/affiliates/engild.jpg" alt="engild">
                        <img src="/images/affiliates/eversky.jpg" alt="eversky">
                        <img src="/images/affiliates/gesher.png" alt="gesher">
                        <img src="/images/affiliates/Key.jpg" alt="Key">
                        <img src="/images/affiliates/lane.jpg" alt="lane">
                        <img src="/images/affiliates/newLegacy.jpg" alt="newLegacy">
                        <img src="/images/affiliates/newlight.png" alt="newlight">
                        <img src="/images/affiliates/Present.jpg" alt="Present">
                        <img src="/images/affiliates/ps.jpg" alt="ps">
                        <img src="/images/affiliates/ready.jpg" alt="ready">
                        <img src="/images/affiliates/red.png" alt="red">
                        <img src="/images/affiliates/sancap.png" alt="sancap">
                        <img src="/images/affiliates/Slaine.jpg" alt="Slaine">
                        <img src="/images/affiliates/swf.jpg" alt="swf">
                        <img src="/images/affiliates/tamaskia.jpg" alt="tamaskia">
                        <img src="/images/affiliates/tanariva.png" alt="tanariva">
                        <img src="/images/affiliates/Titanium.png" alt="Titanium">
                        <img src="/images/affiliates/torrey.png" alt="torrey">
                        <img src="/images/affiliates/Willet.jpg" alt="Willet">
                        <img src="/images/affiliates/yesod.jpg" alt="yesod">
                    </div>
                </div>
                <!--end col-sm-12-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </div>
    <!--end section-grey-->
    <div class="transactions-wrapper">

        <!--begin container-->
        <div class="container-fluid testimonials-wrapper">

            <!--begin row-->
            <div class="row">

                <!--begin col-sm-5 -->
                <div class="col-lg-6">
                    <div class="card text-left">
                      <h3 class="card-header">Last 5 Deposits</h3>
                      <div class="card-body">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Date</th>
                                    <th>Investor</th>
                                    <th>Deposit</th>
                                    <th>Payment Method</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $pay_method = array('BTC');
                                    @endphp
                                    @for ($i = 0; $i < 5; $i++)
                                        @php
                                            shuffle($pay_method);
                                        @endphp
                                        <tr>
                                            <td scope="row">{{ now()->subHours($i/5)->subMinutes($i+4)->subSeconds($i+3) }}</td>
                                            <td>{{ $faker->firstName }}</td>
                                            <td class="text-danger"> <i class="fa fa-arrow-down" aria-hidden="true"></i>{{ config('app.currency') }}{{ rand(500, 500000) }}</td>
                                            <td>{{ $pay_method[0] }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                        </table>
                      </div>
                    </div>

                </div>
                <!--end col-sm-5 -->

                <!--begin col-sm-7 -->
                <div class="col-lg-6">
                    <div class="card text-left">
                      <h3 class="card-header">Last 5 Withdrawals</h3>
                      <div class="card-body">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Date</th>
                                    <th>Investor</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $pay_method = array('BTC');
                                    @endphp
                                    @for ($i = 0; $i < 5; $i++)
                                        @php
                                            shuffle($pay_method);
                                        @endphp
                                        <tr>
                                            <td scope="row">{{ now()->subHours($i/10)->subMinutes($i+4)->subSeconds($i+3) }}</td>
                                            <td>{{ $faker->lastName }}</td>
                                            <td class="text-success"><i class="fa fa-arrow-up" aria-hidden="true"></i>{{ config('app.currency') }}{{ rand(800, 3000000) }}</td>
                                            <td>{{ $pay_method[0] }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <!--end col-sm-7 -->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </div>

    <!--begin section-blue -->
    <section class="section-blue">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row">

                <!--begin col-md-6-->
                <div class="col-md-6 margin-top-10 margin-bottom-30">

                    <h1 class="text-white mb-5 shadow-5">Do you have any issue?
                        Reach us on our live chat or send a support ticket!</h1>
                    <a href="{{ route('contact') }}" class="btn btn-lg btn-danger scrool wow fadeIn" data-wow-delay="1.5s">Contact Us</a>

                </div>
                <!--end col-sm-6-->

                <!--begin col-md-6-->
                <div class="col-md-6">


                </div>
                <!--end col-sm-6-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </section>
    <!--end section-blue-->
@endsection

@section('input-js')
<script>
<<<<<<< HEAD
$('.owl-carousel').owlCarousel({
=======
$('#affiliates').owlCarousel({
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc
    loop:true,
    margin:20,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000: {
            items:5
        }
    }
})
<<<<<<< HEAD
=======
$('#testimony').owlCarousel({
    loop:true,
    margin:20,
    autoplay:true,
    responsive:{
        0:{
            items:1
        }
    }
})
>>>>>>> c8af4c4502f697f3e94eb2411d212dee0ab504cc

</script>
<script>
    console.log(numberWithCommas($('#active-investors').html()))
    var active_investors = numberWithCommas($('#active-investors').html())
    var active_invest = "{{ config('app.currency') }}" + numberWithCommas($('#active-invest').html())
    var average_dep = "{{ config('app.currency') }}" + numberWithCommas($('#average-dep').html())
    var average_pay = "{{ config('app.currency') }}" + numberWithCommas($('#average-pay').html())

    $('#active-investors').html(active_investors)
    $('#active-invest').html(active_invest)
    $('#average-dep').html(average_dep)
    $('#average-pay').html(average_pay)

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
@endsection

