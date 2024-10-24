<nav id="navbar" class="navbar navbar-dark navbar-expand-lg py-md-2 sticky-top">
    <div class="container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-brand me-lg-5">
            <img src="{{ asset('storage/configuration/' . $configuration->logo) }}" alt="Logo" class="logo-dark"
                height="35" />
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <!-- Left Menu -->
            <ul class="navbar-nav me-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-us">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#data-umkm">Data UMKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faqs">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-us">Kontak</a>
                </li>
            </ul>

            <!-- Right Menu -->
            <ul class="navbar-nav align-items-center">
                @unlessrole('User')
                <li class="nav-item">
                    <a href="{{ route('login.user') }}" class="btn btn-sm btn-light rounded-pill btn-hover-effect">
                        <i class="mdi mdi-account-circle me-1"></i>Login Akun
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('registration.showForm') }}"
                        class="btn btn-sm btn-light rounded-pill btn-hover-effect">
                        <i class="mdi mdi-store me-1"></i>Daftarkan UMKM
                    </a>
                </li>
                @endunlessrole

                @role('User')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-user bg-transparent border-0 arrow-none d-flex align-items-center"
                        data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="{{ asset('storage/profiles/' . Auth::id() . '/' . $profile->foto_profil) }}" alt="User Avatar"
                                class="rounded-circle" style="width: 45px; height: 45px;">
                        </span>
                        <span class="ms-2 d-none d-md-block">
                            <h6 class="account-user-name mb-0">{{ Auth::user()->name }}</h6>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Hello {{ Auth::user()->name }}!</h6>
                        </div>
                        <li>
                            <a href="{{ route('profile.show') }}" class="dropdown-item">
                                <i class="mdi mdi-account-circle me-1"></i> My Account
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-1"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endrole
            </ul>
        </div>
    </div>
</nav>

<style>
    .btn-hover-effect {
        transition: all 0.3s ease;
    }

    .btn-hover-effect:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        background-color: #7E71F1;
        color: white;
    }

    .navbar-nav .nav-link {
        font-weight: 600;
        font-size: 16px;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover {
        color: #0d6efd;
        transform: translateY(-2px);
    }

    .navbar-nav .nav-link.active {
        color: #0d6efd;
        border-bottom: 2px solid #0d6efd;
    }

    .navbar-nav .nav-item {
        margin-left: 1rem;
    }
</style>