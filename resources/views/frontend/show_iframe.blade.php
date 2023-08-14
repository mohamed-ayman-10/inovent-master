<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Toastr Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .app {
            background-color: #1e1e1e;
        }

        section.header {
            background: linear-gradient(57.66deg, rgba(185, 65, 197, 0.88) 11.79%, rgba(22, 18, 68, 0.88) 66.58%);
        }

        section.header .content {
            width: fit-content;
            background: rgba(156, 153, 153, 0.43);
        }

        section.sidebar {
            width: 140px;
            background: linear-gradient(57.66deg, rgba(121, 119, 194, 1) 11.79%, rgba(61, 99, 148, 1) 66.58%);
        }

        section.sidebar .btns ul li {
            background: rgba(56, 98, 143, 0.54);
            border-top-right-radius: 100px;
            border-bottom-right-radius: 100px;
            cursor: pointer;
            transition: .3s;
        }

        section.sidebar .btns ul li p {
            transition: .4s;
        }

        section.sidebar .btns ul li:hover,
        section.sidebar .btns ul li.active {
            background-color: #9C9999;
        }

        section.sidebar .btns ul li:hover p,
        section.sidebar .btns ul li.active p {
            color: #3B6392 !important;
        }

        .chat {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #283C61 100%);
            width: 315px;
            height: 350px;
            bottom: 0;
            left: 0;
        }

        .chat .messages {
            overflow-y: auto;
            height: calc(100% - 45px);
        }

        .chat .messages::-webkit-scrollbar {
            width: 0;
        }

        .chat .box .content span {
            color: #BCC2CC;
            font-size: 14px;
        }

        .chat form {
            bottom: 10px;
            left: 0;
        }
    </style>

</head>

<div class="d-flex vh-100">
    <div class="content h-100 w-100">
        <section class="header py-4">
            <div class="content d-flex align-items-center justify-content-center gap-4 ms-auto px-3 me-3">
                <ul class="list-unstyled d-flex align-items-center justify-content-center gap-3 mb-0">
                    <li>
                        <a id="full">
                            <i class="bi bi-fullscreen fs-5 text-light"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-calendar-range fs-5 text-light"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-megaphone fs-5 text-light"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-question-circle fs-5 text-light"></i>
                        </a>
                    </li>
                </ul>
                <div class="info d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-person-circle fs-2 text-light"></i>
                    <p class="mb-0 text-light">{{ Auth::user()->first_name }}</p>
                </div>
            </div>
        </section>
        <div class="m-4">
            <iframe id="event" src="{{ $event->link }}" class="w-100" height="600"></iframe>
        </div>
    </div>
    <section class="sidebar h-100">
        <div class="d-flex flex-column h-100">
            <div class="logo p-3">
                <img src="{{ asset('assets/images/logo.png') }}" class="w-100" alt="logo">
            </div>
            <div class="btns w-100 h-100 d-flex align-items-center justify-content-center">
                <ul class="list-unstyled w-100">
                    <li class="text-center me-2 py-1 mb-3 active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-house-door-fill text-light" viewBox="0 0 16 16">
                            <path
                                d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg>
                        <p class="text-light fw-semibold m-0">Home</p>
                    </li>
                    <li class="text-center me-2 py-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-shop text-light" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                        </svg>
                        <p class="text-light fw-semibold m-0">Interaction</p>
                    </li>
                    <li class="text-center me-2 py-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-motherboard-fill text-light" viewBox="0 0 16 16">
                            <path d="M5 7h3V4H5v3Z" />
                            <path
                                d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm11 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7Zm2 0a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM3.5 10a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM4 4h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3a1 1 0 0 0-1 1Zm7 7.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0-.5.5Z" />
                        </svg>
                        <p class="text-light fw-semibold m-0">courses &
                            workshops</p>
                    </li>
                    <li class="text-center me-2 py-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-book-fill text-light" viewBox="0 0 16 16">
                            <path
                                d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                        </svg>
                        <p class="text-light fw-semibold m-0">learning
                            program</p>
                    </li>
                    <li class="text-center me-2 py-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-bar-chart-fill text-light" viewBox="0 0 16 16">
                            <path
                                d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                        </svg>
                        <p class="text-light fw-semibold m-0">successful
                            stories</p>
                    </li>
                    <li class="text-center me-2 py-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-globe-americas text-light" viewBox="0 0 16 16">
                            <path
                                d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z" />
                        </svg>
                    </li>
                    <li class="text-center me-2 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-escape text-light" viewBox="0 0 16 16">
                            <path
                                d="M8.538 1.02a.5.5 0 1 0-.076.998 6 6 0 1 1-6.445 6.444.5.5 0 0 0-.997.076A7 7 0 1 0 8.538 1.02Z" />
                            <path
                                d="M7.096 7.828a.5.5 0 0 0 .707-.707L2.707 2.025h2.768a.5.5 0 1 0 0-1H1.5a.5.5 0 0 0-.5.5V5.5a.5.5 0 0 0 1 0V2.732l5.096 5.096Z" />
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>


{{-- <div class="w-100 vh-100"> --}}
{{--    <iframe src="{{ $event->link }}" class="w-100 h-100"></iframe> --}}
{{-- </div> --}}
{{-- BootStrab --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script>
    function scrollDown() {
        document.getElementById('chat').scrollTop = document.getElementById('chat').scrollHeight;
        setInterval(scrollDown, 1000);
    }
    // let myDocument = document.documentElement;
    let myDocument = document.getElementById('event');
    let full = document.getElementById('full');
    let check = false;
    full.addEventListener('click', () => {
        if (check == false) {
            check = true;
            if (myDocument.requestFullscreen) {
                myDocument.requestFullscreen();
            } else if (myDocument.msRequestFullscreen) {
                myDocument.msRequestFullscreen();
            } else if (myDocument.mozRequestFullscreen) {
                myDocument.mozRequestFullscreen();
            } else if (myDocument.webkitRequestFullscreen) {
                myDocument.webkitRequestFullscreen();
            }
        } else {
            check = false;
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (myDocument.msexitRequestFullscreen) {
                myDocument.msexitRequestFullscreen();
            } else if (myDocument.mozexitRequestFullscreen) {
                myDocument.mozexitRequestFullscreen();
            } else if (myDocument.webkitexitRequestFullscreen) {
                myDocument.webkitexitRequestFullscreen();
            }
        }
    })
    console.log(full)
</script>


{{-- Footer --}}
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<!-- JQUERY JS -->
<script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (Session::has('message'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.success("{{ Session::get('message') }}", "Success!", {
            timeOut: 6000
        })
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("{{ $error }}")
        </script>
    @endforeach
@endif
</body>

</html>
