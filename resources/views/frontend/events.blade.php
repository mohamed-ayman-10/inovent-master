@extends('frontend.layouts.master')
@section('title', 'Events')
@section('events', 'active')
@section('style')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
@endsection
@section('content')

    {{-- Count Down --}}
    @include('frontend.layouts.countdown')

    {{-- Most Popular Events --}}
    <style>
        .swiper-slide-2 {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-2 {
            width: 100%;
            height: 100%;
        }

        .swiper-slide-2 img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .owl-carousel .card img {
            height: 200px;
        }

        .owl-carousel .card {
            border-radius: 20px;
            overflow: hidden;
        }

        .owl-carousel .owl-nav {
            display: block !important;
            position: absolute;
            top: -105px;
            right: 0;
            margin: 0;
        }

        @media (max-width: 676px) {
            .owl-carousel .owl-nav {
                top: -70px;
            }
        }

        .owl-carousel .owl-nav .owl-prev span,
        .owl-carousel .owl-nav .owl-next span {
            font-size: 60px;
            line-height: 0;
            transition: .05s;
        }

        .owl-carousel .owl-nav .owl-next,
        .owl-carousel .owl-nav .owl-prev {
            line-height: 0 !important;
            width: 40px;
            height: 40px;
            transition: .5s;
            margin: 0 !important;
        }

        .owl-dots {
            display: none !important;
        }

        .content .card .card-body a {
            height: fit-content;
            border: 1px solid #000;
            font-weight: bold
        }

        .content .card .card-body a:hover {
            background-color: var(--text-main-color);
            color: #fff;
            border-color: transparent !important;
        }

        .content .card .card-body p {
            font-size: 12px;
        }

        .content .card .card-body .img img {
            width: 11px;
            height: 11px !important;
        }
    </style>
    <section class="customers">
        <h3 class="text-center main-title my-5">
            @lang('<span class="text-main-color">Most</span> Popular Events')
        </h3>
        <div class="content py-4 section-color">
            <div class="container">
                <div class="owl-carousel owl-theme position-relative">
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('images/interior-design 1.png') }}" class="card-img-top" alt="...">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="card-title">Interior Design Event 2023</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="img">
                                            <img src="{{ asset('images/Vector.svg') }}" class="me-2" alt="">
                                        </div>
                                        <p class="card-text">2 March 2023</p>
                                    </div>
                                </div>
                                <a href="events/1" class="btn px-4 rounded-pill">BUY</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('images/Capture 1.png') }}" class="card-img-top" alt="...">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="card-title">Interior Design Event 2023</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="img">
                                            <img src="{{ asset('images/Vector.svg') }}" class="me-2" alt="">
                                        </div>
                                        <p class="card-text">2 March 2023</p>
                                    </div>
                                </div>
                                <a href="#" class="btn px-4 rounded-pill">BUY</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('images/fashion_19I0742-copy2000x850 1.png') }}" class="card-img-top"
                                alt="...">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="card-title">Interior Design Event 2023</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="img">
                                            <img src="{{ asset('images/Vector.svg') }}" class="me-2" alt="">
                                        </div>
                                        <p class="card-text">2 March 2023</p>
                                    </div>
                                </div>
                                <a href="#" class="btn px-4 rounded-pill">BUY</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
            }
        })
    </script>

 @if (@isset($upcoming_events) and !@empty($upcoming_events))
    {{-- Upcoming Events --}}
    <section class="customers">
        <h3 class="text-center main-title my-5">
            @lang('<span class="text-main-color">Upcoming</span> Events')
        </h3>
        <div class="content py-4 section-color">
            <div class="container">
                <div class="owl-carousel owl-theme position-relative">
                    @if (@isset($upcoming_events) and !@empty($upcoming_events))
                        @foreach ($upcoming_events as $event)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset('images/' . $event->image) }}" class="card-img-top" alt="...">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="card-title">{{ $event->title }}</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="img">
                                                    <img src="{{ asset('images/Vector.svg') }}" class="me-2"
                                                        alt="">
                                                </div>
                                                <p class="card-text">{{ date('N M Y', strtotime($event->start_date)) }}</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('event', $event->id) }}" class="btn px-4 rounded-pill">BUY</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3>@lang('Not Events')</h3>
                    @endif
                </div>
            </div>
        </div>
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 20,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                }
            })
        </script>
    </section>
@endif

    {{-- Current Events --}}
    <style>
        .swiper-slide-2 {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-2 {
            width: 100%;
            height: 100%;
        }

        .swiper-slide-2 img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .owl-carousel .card img {
            height: 200px;
        }

        .owl-carousel .card {
            border-radius: 20px;
            overflow: hidden;
        }

        .owl-carousel .owl-nav {
            display: block !important;
            position: absolute;
            top: -105px;
            right: 0;
            margin: 0;
        }

        @media (max-width: 676px) {
            .owl-carousel .owl-nav {
                top: -70px;
            }
        }

        .owl-carousel .owl-nav .owl-prev span,
        .owl-carousel .owl-nav .owl-next span {
            font-size: 60px;
            line-height: 0;
            transition: .05s;
        }

        .owl-carousel .owl-nav .owl-next,
        .owl-carousel .owl-nav .owl-prev {
            line-height: 0 !important;
            width: 40px;
            height: 40px;
            transition: .5s;
            margin: 0 !important;
        }

        .owl-dots {
            display: none !important;
        }

        .content .card .card-body a {
            height: fit-content;
            border: 1px solid #000;
            font-weight: bold
        }

        .content .card .card-body a:hover {
            background-color: var(--text-main-color);
            color: #fff;
            border-color: transparent !important;
        }

        .content .card .card-body p {
            font-size: 12px;
        }

        .content .card .card-body .img img {
            width: 11px;
            height: 11px !important;
        }
    </style>
    <section class="customers">
        <h3 class="text-center main-title my-5">
            @lang('<span class="text-main-color">Current</span> Events')
        </h3>
        <div class="content py-4 section-color">
            <div class="container">
                <div class="owl-carousel owl-theme position-relative">
                    @if (@isset($now_events) and !@empty($now_events))
                        @foreach ($now_events as $event)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset('images/' . $event->image) }}" class="card-img-top" alt="...">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="card-title">{{ $event->title }}</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="img">
                                                    <img src="{{ asset('images/Vector.svg') }}" class="me-2"
                                                        alt="">
                                                </div>
                                                <p class="card-text">{{ date('N M Y', strtotime($event->start_date)) }}</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('event', $event->id) }}" class="btn px-4 rounded-pill">BUY</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3>@lang('Not Events')</h3>
                    @endif
                </div>
            </div>
        </div>

    </section>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
            }
        })
    </script>

    @if (isset($now_coming_event) && !@empty($now_coming_event))
        {{-- Upcoming Now --}}
        <section class="updates pt-5">
            <h3 class="text-center main-title">
                @lang('<span class="text-main-color">Upcoming</span> Now')
            </h3>
            <div class="section-color py-5 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 pe-0 pe-lg-2 mb-5 mb-lg-0">
                            <div class="box text-center text-lg-start">
                                <h6 class="text-main-color">{{ $now_coming_event->title }}</h6>
                                <h2 class="text-main-2">{{ date('F', strtotime($now_coming_event->start_date)) }}</h2>
                                <p class="pe-0 pe-lg-2">{{ $now_coming_event->description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0">
                            <div class="img text-center text-lg-start">
                                <img class="w-100 h-100" src="{{ asset('images/' . $now_coming_event->image) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
