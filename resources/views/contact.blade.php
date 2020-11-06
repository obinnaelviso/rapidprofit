@extends('layouts.index.main')
@section('title', 'Contact Us - '.config('app.name').' - Your No. 1 Investment Platform')
@section('content')
<!--begin home_wrapper -->
<section id="home_wrapper" class="about-wrapper">

    <!--begin gradient_overlay -->
    <div class="gradient_overlay"></div>
    <!--end gradient_overlay -->

    <!--begin container-->
    <div class="container home-wrappe-inside">

        <!--begin row-->
        <div class="row margin-bottom-30">

            <!--begin col-md-6-->
            <div class="col-md-6 padding-top-20">

                <h1 class="home-title wow fadeIn margin-bottom-100" data-wow-delay="0.5s">Get in touch with us today!</h1>

                {{-- <p class="home-subtitle wow fadeIn" data-wow-delay="1s">
                    Design &amp; style should always work toward making you look<br>
                    good &amp; feel good - without a lot of efforts - so you can<br>
                    always get on with the things that truly matter.
                </p> --}}
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

<section class="section-white portfolio-padding" id="portfolio">

    <!--begin container-->
    <div class="container">

        <!--begin row-->
        <div class="row">

            <!--begin col-md-12-->
            <div class="col-lg-8">
                @include('layouts.alerts')
                <form class="form-contact contact_form" action="{{ route('contact') }}" method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" required name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" required name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" required name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" required name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                {{-- <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Buttonwood, California.</h3>
                        <p>Rosemead, CA 91770</p>
                    </div>
                </div> --}}
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h6>{{ config('mail.from.address') }}</h6>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
