<footer class="py-5">
    <div class="container">
        <div class="row text-center text-lg-start">
            <div class="col-lg-4 d-flex align-items-center justify-content-lg-start justify-content-center mb-4 mb-lg-0">
                <div class="box w-50">
                    <img src="{{ asset('images/footer.png') }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="box">
                    <h5 class="text-main-color">@lang('Menu')</h5>
                    <ul class="p-0 m-0 links">
                        <li>
                            <a class="text-main-2 fs-6 {{ app()->getLocale() == 'ar' ? 'fw-bold' : '' }}"
                                href="">@lang('Home')</a>
                        </li>
                        <li>
                            <a class="text-main-2 fs-6 {{ app()->getLocale() == 'ar' ? 'fw-bold' : '' }}"
                                href="">@lang('Explore Events')</a>
                        </li>
                        <li>
                            <a class="text-main-2 fs-6 {{ app()->getLocale() == 'ar' ? 'fw-bold' : '' }}"
                                href="">@lang('About Us')</a>
                        </li>
                        <li>
                            <a class="text-main-2 fs-6 {{ app()->getLocale() == 'ar' ? 'fw-bold' : '' }}"
                                href="">@lang('Contact Us')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box">
                    <h5 class="text-main-color">@lang('Contact Us')</h5>
                    <ul class="p-0 m-0">
                        <li>
                            <a class="text-main-2 fs-6"
                                href="mailto:Explorebali@contact.com"><strong>@lang('Email'):</strong>
                                Explorebali@contact.com</a>
                        </li>
                        <li>
                            <Tel: class="text-main-2 fs-6" href=""><strong>@lang('Tel'):</strong> +62-36 739
                                299</a>
                        </li>
                    </ul>
                    <div class="icon mt-4 ">
                        <ul
                            class="p-0 m-0 d-flex align-items-center gap-4 icon justify-content-lg-start justify-content-center">
                            <li>
                                <a href="">
                                    <i class="bi bi-facebook text-main-2"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="bi bi-instagram text-main-2"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="bi bi-whatsapp text-main-2"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="bi bi-twitter text-main-2"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- Contact us
Email: Explorebali@contact.com
Tel: +62-36 739 299 --}}
