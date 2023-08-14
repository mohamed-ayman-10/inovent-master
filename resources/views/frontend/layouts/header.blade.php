<header>
    <div class="banner" style="background:  url({{ url('images/banner.png)') . ' ' . 'center center/cover' }}">
    </div>
    <nav id="navbar" class="navbar bgcolorlight fixed-top navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <div class="menu">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0" {{ app()->getLocale() == 'ar' ? 'dir=rtl' : '' }}>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold @yield('home')"
                           aria-current="page" href="{{ url('/') }}">@lang('Home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold @yield('events')"
                           href="{{ url('events') }}">@lang('Explore Events')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold"
                           href="#">@lang('About Us')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold"
                           href="#">@lang('Contact Us')</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="searsh me-3">
                        <i class="bi bi-search rounded"></i>
                        <input type="text" class="w-100 h-100 text-light px-2 py-1">
                    </div>
                    @if (!Auth::check())
                        <a href="{{ url('/login') }}" class="text-light py-2 px-3 signup me-3" type="submit">@lang('Join Us')</a>
                    @endif
                    <div class="dropdown">
                        <button class="bg-transparent lang text-light border-0 dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            @if (app()->getLocale() == 'ar')
                                AR
                            @elseif (app()->getLocale() == 'en')
                                EN
                            @endif

                        </button>
                        <ul class="dropdown-menu">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="body" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
        <div class="container position-relative">
            <div class="row h-100">
                <div class="col-md-8 d-grid home-box mb-4">
                    <div
                        class="box-left text-center  {{ app()->getLocale() == 'ar' ? 'text-md-end' : 'text-md-start' }}">
                        <h1 class="box-h1 text-main-2">
                            @lang('The Wonderful Visual') <br>
                            <strong>@lang('Adventure')</strong>
                        </h1>
                        <p class="box-p mt-4 {{ app()->getLocale() == 'ar' ? 'ps-md-5 ps-0' : 'pe-md-5 pe-0' }}">

                            @lang('Inovent authorizes you to create an integrated virtual world for your audience that will keep them motivated and entertained To make your event more special and unique without VR head set')

                        </p>
                    </div>
                </div>
                <div class="col-md-4 d-grid home-box">
                    <div class="box-right">
                        <a href="{{ isset($now_event) ? 'events/' . $now_event[0]->id : '#' }}"
                           class="a-1 rounded-pill bg-main-2 text-light d-block mx-auto mb-4 {{ app()->getLocale() == 'ar' ? 'fw-bold' : '' }}">@lang('RESERVE YOUR SEAT')</a>
                        <a href="{{ url('events') }}"
                           class="a-2 rounded-pill text-light d-block mx-auto {{ app()->getLocale() == 'ar' ? 'fw-bold' : '' }}">@lang('See More')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
