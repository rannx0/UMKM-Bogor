@extends('layouts.backend')

@section('content')
<div class="m-1 shadow-lg">
    <div class="row">
        
        <div class="col-sm-12">
            
            <!-- Profile -->
            <div class="card bg-primary m-3 rounded">
                <!-- Background cover photo -->
                <div class="profile-cover" style="position: relative; width: 100%; height: 100%; overflow: hidden;">
                    @if($user->profile && $user->profile->foto_sampul)
                    <img src="{{ asset('storage/profiles/' . $user->id . '/' . $user->profile->foto_sampul) }}"
                        alt="Cover Photo" style="width: 100%; height: auto;">
                    @else
                    <div class="text-white"
                        style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                        <p>Tidak Tersedia</p>
                    </div>
                    @endif


                    <!-- Tombol Kembali -->
                    <a href="{{ url()->previous() }}" class="btn btn-light mt-3 ms-3 position-absolute" style="z-index: 10; left: 0; top: 0;">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                    <!-- End Tombol Kembali -->

                </div>

                <!-- Profile section -->
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="border border-3 border-white rounded-circle"
                                        style="width: 150px; height: 150px; overflow: hidden;">
                                        @if($user->profile && $user->profile->foto_profil)
                                        <img src="{{ asset('storage/profiles/' . $user->id . '/' . $user->profile->foto_profil) }}"
                                            alt="Foto Profil" class="w-100 h-100 rounded-circle"
                                            style="object-fit: cover;">
                                        @else
                                        <div
                                            class="d-flex align-items-center justify-content-center w-100 h-100 bg-secondary rounded-circle">
                                            <p class="text-white">Tidak Tersedia</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col">
                                    <div>
                                        <h2 class="mt-1 text-white">{{ $user->name }}</h2>
                                        <p class="text-white">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row -->
                </div> <!-- end card-body/ profile-user-box-->
            </div>
            <!--end profile/ card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <!-- Personal Information -->
            <div class="card ms-3">
                <div class="card-body">
                    <h4 class="mt-0 mb-3">Personal Info</h4>
                    <h5 class="header-title mt-0 mb-3">Bio</h5>
                    <p class="text-muted font-13">{{ $user->profile->bio ?? 'Tidak tersedia' }}</p>
                    <hr />
                    <div class="text-start">
                        <p class="text-muted"><strong>Full Name:</strong> <span class="ms-2">{{
                                $user->personalData->nama_lengkap ?? 'Tidak tersedia' }}</span></p>
                        <p class="text-muted"><strong>Mobile:</strong> <span class="ms-2">{{
                                $user->personalData->nomor_telepon ?? 'Tidak tersedia' }}</span></p>
                        <p class="text-muted"><strong>Location:</strong> <span class="ms-2">{{
                                $user->personalData->alamat ?? 'Tidak tersedia' }}</span></p>
                    </div>
                </div>
            </div>
            <!-- End Personal Information -->
        </div>
        <div class="col-xl-4">
            <!-- Media Sosial Card -->
            <div class="card text-white bg-info ms-3" style="max-height: 300px; overflow-y: auto;">
                <div class="card-body">
                    <h4 class="card-title text-white">Media Sosial</h4>
                    <div class="d-flex justify-content-start flex-column mt-3">
                        <div class="d-flex flex-wrap gap-1 justify-content-start">
                            @if(empty($mediaSocialLinks) || !collect($mediaSocialLinks)->contains('show', true))
                            <span class="text-light">Tidak Tersedia</span>
                            @else
                            @foreach($mediaSocialLinks as $key => $link)
                            @if($link['show'])
                            <a class="btn btn-light btn-sm social-btn" href="{{ $link['url'] }}"
                                title="{{ ucfirst($key) }}">
                                <i class="mdi mdi-{{ $key }}"></i>
                            </a>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Media Sosial Card -->
        </div>
    </div>
</div>
@endsection
