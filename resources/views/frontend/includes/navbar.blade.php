<!-- NAVBAR START -->
<nav id="navbar" class="navbar navbar-expand-lg py-lg-3 navbar-dark sticky-top">
    <div class="container">

        <!-- logo -->
        <a href="index.html" class="navbar-brand me-lg-5">
            <img src="assets/images/logo.png" alt="" class="logo-dark" height="30" />
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
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">FAQs</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">Clients</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>

            <!-- right menu -->
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-1">
                    <button type="button" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#login-modal"><i class="mdi mdi-account-circle me-1"></i>Sign in Account</button>
                </li>
                <li class="nav-item me-0">
                    <a href="{{ route('registration.showForm')}}"
                        class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                        <i class="mdi mdi-store me-1"></i>Register UMKM
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- NAVBAR END -->

<!-- Login modal -->
<div id="login-modal" class="rounded modal fade" tabindex="1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-4">
                <a href="index.html" class="text-success">
                    <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                </a>
            </div>
            <div class="modal-body px-4 pb-5">
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    
                    <!-- Email Input -->
                    <div class="row mb-3">
                        <label class="col-3 col-form-label" for="email">Email</label>
                        <div class="col-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="row mb-3">
                        <label class="col-3 col-form-label" for="password">Password</label>
                        <div class="col-9">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="row mb-3">
                        <div class="col-3 col-form-label"></div>
                        <div class="col-9">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-md rounded px-5">
                            <i class="mdi mdi-login"></i> Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>