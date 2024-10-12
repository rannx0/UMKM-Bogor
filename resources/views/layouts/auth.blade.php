<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/hyper/saas/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:21:17 GMT -->

<head>
    <title>@yield('title')</title>

    @include('auth.includes.head')
    @yield('styles')
</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>

    <!-- Pre-loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border avatar-lg text-primary" role="status">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->
    <!-- Begin page -->
    @yield('content')
    <!-- end page -->
    <!-- END wrapper -->


    @include('auth.includes.script')

    @yield('scripts')
</body>

</html>