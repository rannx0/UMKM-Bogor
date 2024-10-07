@extends('layouts.register')

@section('content')
<section class="hero">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center p-5">
                        <!-- Success Icon -->
                        <h2 class="mt-0">
                            <i class="mdi mdi-check-circle-outline text-success" style="font-size: 4rem;"></i>
                        </h2>

                        <!-- Success Message -->
                        <h3 class="mt-3 font-weight-bold">Registration Successful!</h3>
                        <p class="w-75 mb-4 mx-auto text-muted">
                            Terima kasih telah mendaftar. Proses pendaftaran Anda berhasil disimpan. Anda dapat melanjutkan ke halaman login untuk mengakses akun Anda.
                        </p>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg px-4">
                                <i class="mdi mdi-arrow-left"></i> Back to Home
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-success btn-lg px-4">
                                <i class="mdi mdi-login"></i> Continue to Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
