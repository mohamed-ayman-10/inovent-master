<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('dashboard.layouts.head')

</head>

<body class="app sidebar-mini ltr light-mode">


<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{asset('backend')}}/assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        <!-- app-Header -->
        @include('dashboard.layouts.header')
        <!-- /app-Header -->

        <!--APP-SIDEBAR-->
        @include('dashboard.layouts.sidbar')
        <!--/APP-SIDEBAR-->

        <!--app-content open-->
        <div class="main-content app-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">
                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <h1 class="page-title">@yield('page_title')</h1>
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">@yield('page_title_main_nav')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('page_title_nav')</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    @yield('content')
                </div>
                <!-- CONTAINER END -->
            </div>
        </div>
        <!--app-content close-->

    </div>

    <!-- FOOTER -->
    @include('dashboard.layouts.footer')
    <!-- FOOTER END -->

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

@include('dashboard.layouts.scripts')

</body>

</html>
