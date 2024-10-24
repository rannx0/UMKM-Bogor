<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    @include('frontend.includes.head')
    @yield('styles')
</head>

<body class="loading" data-layout-config='{"darkMode":false}'>

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
    <div class="wrapper">
        @yield('content')
    </div>

    @include('frontend.includes.footer')

    @include('frontend.includes.script')

    @yield('scripts')

</body>

</html>