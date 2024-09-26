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
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            @endrole
                        
                            @role('Admin')
                            <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            @endrole
                        
                            @role('Manager')
                            <a href="{{ route('manager.dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            @endrole
                        
                            @role('Administrator')
                            <a href="{{ route('administrator.dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            @endrole
                        
                            @role('CEO')
                            <a href="{{ route('ceo.dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            @endrole
                        
                            @role('UMKM Management')
                            <a href="{{ route('umkm-management.dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            @endrole
                        
                            @role('Configurations Management')
                            <a href="{{ route('config-management.dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            @endrole
                        </li>
                        

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarNotification" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-bell"></i>
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
                                        <a href="#">Massage</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title side-nav-item">Apps</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="dripicons-gear"></i>
                                <span>Configuration </span>
                            </a>
                        </li>

                        @role('Superadmin')
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPermission" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-padlock"></i>
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

                        <li class="side-nav-title side-nav-item">Database</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-padlock"></i>
                                <span>Users </span>
                            </a>
                            <div class="collapse" id="sidebarUsers">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="crm-dashboard.html">Users</a>
                                    </li>
                                    <li>
                                        <a href="crm-projects.html">Personal Data</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarUmkm" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-padlock"></i>
                                <span>Data Umkm </span>
                            </a>
                            <div class="collapse" id="sidebarUmkm">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="crm-dashboard.html">Data Pengguna</a>
                                    </li>
                                    <li>
                                        <a href="crm-projects.html">Kategori Usaha</a>
                                    </li>
                                    <li>
                                        <a href="crm-orders-list.html">Data Keuangan</a>
                                    </li>
                                    <li>
                                        <a href="crm-orders-list.html">Data Lokasi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarLocations" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                                <i class="uil uil-tachometer-fast"></i>
                                <span class="badge bg-danger text-white float-end">New</span>
                                <span>Data Locations </span>
                            </a>
                            <div class="collapse" id="sidebarLocations">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="crm-dashboard.html">Provinsi</a>
                                    </li>
                                    <li>
                                        <a href="crm-projects.html">Kota</a>
                                    </li>
                                    <li>
                                        <a href="crm-orders-list.html">Kecamatan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->