<!-- resources/views/auth/login.blade.php -->
@extends('layouts.auth')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth auth-img-bg">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                    <div class="row">
                        <div class="brand-logo">
                            <i class="fa fa-user-circle fa-5x"></i>
                        </div>
                        <div class="mt-4 ml-1 text-center">
                            <h4>Hello! Let's get started</h4>
                        </div>
                    </div>

                    <form class="pt-3" method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-user text-primary"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control form-control-lg" name="email"
                                    id="exampleInputEmail1" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-lock text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control form-control-lg" name="password"
                                    id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary">
                                SIGN IN
                            </button>
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input" name="remember">
                                    Keep me signed in
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
@endsection