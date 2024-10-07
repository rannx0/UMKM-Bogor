@extends('layouts.register')

@section('content')
<section class="hero">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg border border-primary">
                    <div class="card-header border-primary">
                        <h2 class="text-center mt-3 ">Sign In</h2>
                    </div>
                    <div class="card-body px-5 py-4">
                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
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
    </div>
</section>
@endsection
