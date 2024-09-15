<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- backend/includes/head -->
    @include('admin.includes.head')

    <!-- backend/yield/style -->
    @yield('styles')

</head>

<body>
    <div class="container-scroller">
        @yield('content')
    </div>
    <!-- backend/includes/Script -->
    @include('admin.includes.script')
    @yield('scripts')
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->

</html>