<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:21:17 GMT -->

<head>
    <title>Landing Page | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>

    @include('frontend.includes.head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="loading" data-layout-color="light" data-rightbar-onstart="true" style="background-color: #7E70F0">

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

    @yield('content')

    @include('frontend.includes.script')

    @yield('scripts')
</body>


<!-- Mirrored from coderthemes.com/hyper/saas/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:21:23 GMT -->

</html>