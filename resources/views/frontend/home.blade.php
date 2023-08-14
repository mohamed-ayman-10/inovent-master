@extends('frontend.layouts.master')
@section('title', 'Inovent')
@section('home', 'active')
@section('style')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
@endsection
@section('content')

    {{-- Count Down --}}
    @include('frontend.layouts.countdown')

    {{-- Our Last Updates --}}
    @if (isset($now_coming_event) && !@empty($now_coming_event))
        <section class="updates">
            <h3 class="text-center main-title">
                @lang('<span class="text-main-color">Our</span> Last Updates')
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

    {{-- Tags --}}
    <section class="tags">
        <h3 class="text-center main-title my-5">
            @lang('<span class="text-main-color">Popular</span> Tags')
        </h3>
        <div class="tags pt-5 pb-1" style="background:  url({{ url('images/tags.png)') . ' ' . 'center center/cover' }}">
            <ul class="text-light d-flex flex-wrap p-0 text-center justify-content-center align-items-center">
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Software</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Books</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Photography</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">User Experience</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Lifestyle</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Programming</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Software</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Software</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Books</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Photography</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">User Experience</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Lifestyle</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Programming</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Software</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Software</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Books</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Photography</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">User Experience</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Lifestyle</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Programming</li>
                <li class="border ms-3 rounded py-1 px-3 section-color mb-3">Software</li>
            </ul>
        </div>
    </section>

    {{-- Our Last Events --}}
    @if (count($last_events) > 0)


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
                @lang('<span class="text-main-color">Our</span> Last Events')
            </h3>
            <div class="content py-4">
                <div class="container">
                    <div class="owl-carousel owl-theme position-relative">
                        @foreach ($last_events as $item)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="...">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="card-title">{{ $item->title }}</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="img">
                                                    <img src="{{ asset('images/Vector.svg') }}" class="me-2"
                                                        alt="">
                                                </div>
                                                <p class="card-text">{{ date('N M Y', strtotime($item->start_date)) }}</p>
                                            </div>
                                        </div>
                                        <a href="events/1" class="btn px-4 rounded-pill">More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
    @endif


    {{-- Our Customer's Experience --}}
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
    </style>
    <section class="customers">
        <h3 class="text-center main-title my-5">
            @lang('<span class="text-main-color">Our</span> Customer\'s Experience')
        </h3>
        <div class="content py-5 section-color">
            <div class="owl-carousel owl-theme position-relative">
                <div class="item">
                    <div class="rounded p-4 bg-light">
                        <div class="head d-flex justify-content-between">
                            <div class="img">
                                <img src="{{ asset('images/cus-1.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="rate d-flex gap-1">
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-half fs-6"></i>
                                <i class="bi bi-star fs-6"></i>
                            </div>
                        </div>
                        <div class="body mt-4">
                            <h4>Ronald Richards</h4>
                            <p>ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit
                                mollit.
                                Exercitation veniam consequat sunt nostrud amet.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="rounded p-4 bg-light">
                        <div class="head d-flex justify-content-between">
                            <div class="img">
                                <img src="{{ asset('images/cus-2.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="rate d-flex gap-1">
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-half fs-6"></i>
                                <i class="bi bi-star fs-6"></i>
                            </div>
                        </div>
                        <div class="body mt-4">
                            <h4>Ronald Richards</h4>
                            <p>ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit
                                mollit.
                                Exercitation veniam consequat sunt nostrud amet.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="rounded p-4 bg-light">
                        <div class="head d-flex justify-content-between">
                            <div class="img">
                                <img src="{{ asset('images/cus-1.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="rate d-flex gap-1">
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-half fs-6"></i>
                                <i class="bi bi-star fs-6"></i>
                            </div>
                        </div>
                        <div class="body mt-4">
                            <h4>Ronald Richards</h4>
                            <p>ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit
                                mollit.
                                Exercitation veniam consequat sunt nostrud amet.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="rounded p-4 bg-light">
                        <div class="head d-flex justify-content-between">
                            <div class="img">
                                <img src="{{ asset('images/cus-2.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="rate d-flex gap-1">
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-fill fs-6"></i>
                                <i class="bi bi-star-half fs-6"></i>
                                <i class="bi bi-star fs-6"></i>
                            </div>
                        </div>
                        <div class="body mt-4">
                            <h4>Ronald Richards</h4>
                            <p>ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit
                                mollit.
                                Exercitation veniam consequat sunt nostrud amet.</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 25,
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

@endsection
