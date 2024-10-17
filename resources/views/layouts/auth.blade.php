<!DOCTYPE html>
<html lang="en">

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
    
    @yield('content')


    @include('auth.includes.script')

    @yield('scripts')
</body>

</html>