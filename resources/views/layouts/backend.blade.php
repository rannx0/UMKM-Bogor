<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>@yield('title')</title>

        @include('backend.includes.head')

        @yield('styles')
    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <div class="wrapper">

            @include('backend.includes.sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    @include('backend.includes.navbar')

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        @yield('content')
                        
                    </div>

                </div>

                <!-- Footer Start -->
                @include('backend.includes.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        @include('backend.includes.script')
        @yield('scripts')
        
    </body>
</html>
