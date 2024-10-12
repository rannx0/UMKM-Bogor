@extends('layouts.register')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card shadow-lg animated fadeInUp"> <!-- Animasi fadeInUp -->
                <!-- Logo -->
                <div class="pt-4 text-center border-0">
                    <a href="{{ url('/') }}">
                        <span><img src="{{ asset('assets/images/profile-login-logo.svg') }}" alt="Logo" width="130px" ></span> <!-- Animasi pulse pada logo -->
                    </a>
                </div>

                <div class="card-body p-4">
                    <div class="text-center w-75 m-auto">
                        <h3 class="text-dark text-center pb-0 fw-bold">Sign In</h3>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                                name="email" required autofocus placeholder="Enter your email" style="transition: all 0.3s ease;">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required placeholder="Enter your password" style="transition: all 0.3s ease;">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
                        
                        <!-- Buttons with Hover Effect -->
                        <div class="d-flex row justify-content-betweeen">
                            <div class="col-md mb-3 mb-0 text-center">
                                <a href="{{ route('home')}}" class="btn btn-outline-danger btn-hover-effect">Back to home</a> <!-- Tambah hover -->
                            </div>
                            <div class="col-md mb-3 mb-0 text-center">
                                <button class="btn btn-primary px-4 btn-hover-effect" type="submit">Log In</button> <!-- Tambah hover -->
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- Sign Up Link -->
            <div class="row mt-3">
                <div class="col-12 text-center text-white">
                    <p class="text-white ">Don't have an account?
                        <a href="{{ route('registration.showForm') }}" class="text-white ms-1"><b>Sign Up</b></a>
                    </p>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->
@endsection

<!-- CSS Animations -->
<style>
    body {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); /* Gradient background */
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }   
    .animated {
        animation-duration: 1s;
        animation-fill-mode: both;
    }

    .pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    .btn-hover-effect:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    input.form-control {
        border-radius: 0.375rem;
    }

    input.form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>
