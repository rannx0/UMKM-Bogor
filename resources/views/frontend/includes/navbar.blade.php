<style>
    .btn-hover-effect {
        transition: all 0.3s ease;
    }

    .btn-hover-effect:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        background-color: #7E71F1; /* Warna hover biru lebih cerah */
        color: white; /* Ubah teks jadi putih */
    }

    .navbar-nav .nav-link {
        font-weight: 600; /* Menebalkan teks */
        font-size: 16px; /* Ukuran font */
        color: #ffffff; /* Warna default teks */
        padding: 0.5rem 1rem; /* Tambahkan padding */
        transition: all 0.3s ease-in-out; /* Animasi halus saat hover */
    }

    .navbar-nav .nav-link:hover {
        color: #0d6efd; /* Warna saat hover (Bootstrap primary color) */
        transform: translateY(-2px); /* Sedikit mengangkat teks */
    }

    .navbar-nav .nav-link.active {
        color: #0d6efd; /* Warna untuk link aktif */
        border-bottom: 2px solid #0d6efd; /* Garis bawah untuk item aktif */
    }

    .navbar-nav .nav-item {
        margin-left: 1rem; /* Tambahkan margin antar item */
    }

</style>
<!-- Updated NAVBAR -->
<nav id="navbar" class="navbar navbar-expand-lg py-lg-3 sticky-top">
    <div class="container">

        <!-- logo -->
        <a href="index.html" class="navbar-brand me-lg-5">
            <img src="{{ asset('storage/configuration/' . $configuration->logo) }}" alt="" class="logo-dark" height="30" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- menus -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!-- left menu -->
            <ul class="navbar-nav me-auto align-items-center ">
                <li class="nav-item mx-lg-1">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#about-us">About Us</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#data-umkm">Data UMKM</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#faqs">FAQs</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#contact-us">Contact</a>
                </li>
            </ul>

            <!-- right menu -->
            <ul class="navbar-nav ms-auto align-items-center">
                @unlessrole('User')
                <li class="nav-item me-1">
                    <a href="{{ route('login.user')}}"
                        class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex btn-hover-effect">
                        <i class="mdi mdi-account-circle me-1"></i>Sign in Account
                    </a>
                </li>
                <li class="nav-item me-1">
                    <a href="{{ route('registration.showForm')}}"
                        class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex btn-hover-effect">
                        <i class="mdi mdi-store me-1"></i>Register UMKM
                    </a>
                </li>
                @endunlessrole
                @role('User')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bg-transparent" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle"
                                style="width: 50px">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        {{-- Dropdown items --}}
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>My Account</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item notify-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
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
