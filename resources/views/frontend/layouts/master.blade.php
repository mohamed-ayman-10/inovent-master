<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--Bootstrap--}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    {{--Bootstrap Icons--}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-icons.css')}}">
    {{--Owl Carousel--}}
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    {{--Style--}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{--Favicon--}}
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
    <!-- Toastr Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('style')
    <title>@yield('title')</title>
</head>
<body>
{{--Up To Down--}}
<div id="up" class="up fw-bold text-light">
    <i class="bi bi-chevron-up"></i>
</div>

{{--Header--}}
@include('frontend.layouts.header')

@yield('content')

{{--Footer--}}
@include('frontend.layouts.footer')

{{--Footer--}}
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<!-- JQUERY JS -->
<script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(Session::has('message'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.success("{{Session::get('message')}}", "Success!", {timeOut:6000})
    </script>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
            }
            toastr.error("{{$error}}")
        </script>
    @endforeach
@endif
</body>
</html>
