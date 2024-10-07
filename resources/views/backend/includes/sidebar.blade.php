<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png')}}" alt="" height="30">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                @role('Superadmin')
                <a href="{{ route('superadmin.dashboard') }}" class="side-nav-link">
                    <i class="uil uil-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                @endrole

                @role('Admin')
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="uil uil-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                @endrole

                @role('Manager')
                <a href="{{ route('manager.dashboard') }}" class="side-nav-link">
                    <i class="uil uil-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                @endrole

                @role('Administrator')
                <a href="{{ route('administrator.dashboard') }}" class="side-nav-link">
                    <i class="uil uil-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                @endrole

                @role('CEO')
                <a href="{{ route('ceo.dashboard') }}" class="side-nav-link">
                    <i class="uil uil-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                @endrole

                @role('UMKM Management')
                <a href="{{ route('umkm-management.dashboard') }}" class="side-nav-link">
                    <i class="uil uil-briefcase"></i>
                    <span>Dashboard</span>
                </a>
                @endrole

                @role('Configurations Management')
                <a href="{{ route('config-management.dashboard') }}" class="side-nav-link">
                    <i class="uil uil-cog"></i>
                    <span>Dashboard</span>
                </a>
                @endrole
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarNotification" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil uil-bell"></i>
                    <span>Notification </span>
                </a>
                <div class="collapse" id="sidebarNotification">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="#">New Users</a>
                        </li>
                        <li>
                            <a href="#">User Changes</a>
                        </li>
                        <li>
                            <a href="#">Messages</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item mt-2">Apps</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="sidebarDashboards"
                    class="side-nav-link">
                    <i class="uil uil-cog"></i>
                    <span>Configuration </span>
                </a>
            </li>

            @role('Superadmin')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPermission" aria-expanded="false"
                    aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil uil-shield"></i>
                    <span>Admin Manager </span>
                </a>
                <div class="collapse" id="sidebarPermission">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admins.index')}}">Admin</a>
                        </li>
                        <li>
                            <a href="{{ route('permissions.index')}}">Permission</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endrole

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#usermanager" aria-expanded="false" aria-controls="sidebarDashboards"
                    class="side-nav-link">
                    <i class="uil uil-users-alt"></i>
                    <span>User Manager </span>
                </a>
                <div class="collapse" id="usermanager">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('users.list')}}">Users</a>
                        </li>
                        <li>
                            <a href="{{ route('personal_data.list')}}">Personal Data Users</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item mt-2">Umkm Configuration</li>

            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('umkm-categories.index')}}">
                    <i class="uil uil-sitemap"></i>
                    <span>Kategori Usaha</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLocations" aria-expanded="false" aria-controls="sidebarCrm"
                    class="side-nav-link">
                    <i class="uil uil-map-marker"></i>
                    <span>Database Locations </span>
                </a>
                <div class="collapse" id="sidebarLocations">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('lokasi')}}">Database Lokasi</a>
                        </li>
                        <li>
                            <a href="{{ route('provinsi.index') }}">Provinsi</a>
                        </li>
                        <li>
                            <a href="{{ route('kabupaten_kota.index')}}">Kota</a>
                        </li>
                        <li>
                            <a href="{{ route('kecamatan.index') }}">Kecamatan</a>
                        </li>
                        <li>
                            <a href="{{ route('kelurahan.index') }}">Kelurahan</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item mt-2">Database Umkm</li>

            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('userdata.index')}}">
                    <i class="uil uil-user"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a class="side-nav-link" href="{{ route('usaha.list')}}">
                    <i class="uil uil-building"></i>
                    <span>Data Usaha</span>
                </a>
            </li>
        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->