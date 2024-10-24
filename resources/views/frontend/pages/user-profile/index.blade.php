@extends('layouts.frontend')

@section('content')
<div class="m-1 shadow-lg">
    <div class="row">
        <div class="col-sm-12">
            <!-- Profile -->
            <div class="card bg-primary m-3 rounded">
                <!-- Background cover photo -->
                <div class="profile-cover" style="position: relative; width: 100%; height: 380px; overflow: hidden;">
                    <img src="{{ asset('storage/profiles/' . Auth::id() . '/' . $profile->foto_sampul) }}"
                        alt="Cover Photo" style="width: 100%; height: auto;">
                </div>

                <!-- Profile section -->
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="border border-3 border-white rounded-circle"
                                        style="width: 150px; height: 150px; overflow: hidden;">
                                        <img src="{{ asset('storage/profiles/' . Auth::id() . '/' . $profile->foto_profil) }}"
                                            alt="Foto Profil" class="w-100 h-100 rounded-circle"
                                            style="object-fit: cover;">
                                    </div>
                                </div>

                                <div class="col">
                                    <div>
                                        <h2 class="mt-1  text-white">{{ Auth::user()->name }}</h2>
                                        <p class="font-26 text-white-50">Pemilik usaha "{{ $usaha->nama_usaha}}"</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                <a href="{{ route('profile.edit')}}">

                                    <button type="button" class="btn btn-light">
                                        <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                    </button>
                                </a>
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
            <!-- Personal-Information -->
            <div class="card ms-3 ">
                <div class="card-body">
                    <h4 class="mt-0 mb-3">Personal Info</h4>
                    <h5 class="header-title mt-0 mb-3">Bio</h5>
                    <p class="text-muted font-13">
                        {{ $profile->bio }}
                    </p>

                    <hr />
                    <div class="text-start">
                        <p class="text-muted"><strong>Full Name :</strong> <span class="ms-2">{{
                                $personalData->nama_lengkap}}</span></p>

                        <p class="text-muted"><strong>Mobile :</strong><span class="ms-2">{{
                                $personalData->nomor_telepon}}</span></p>

                        <p class="text-muted"><strong>Email :</strong> <span class="ms-2">{{ Auth::user()->email
                                }}</span>
                        </p>

                        <p class="text-muted"><strong>Location :</strong> <span class="ms-2">{{
                                $personalData->alamat}}</span></p>

                    </div>
                </div>
            </div>
            <!-- End Personal-Information -->

            <!-- Business-Information -->
            <div class="card ms-3">
                <div class="card-body">
                    <h4 class="mt-0 mb-3">Business Info</h4>

                    <!-- Deskripsi -->
                    <h5 class="mt-0 mb-3">Deskripsi</h5>
                    <p class="text-muted font-13">{{ $profile->bio }}</p>

                    <hr />

                    <div class="text-start">
                        <!-- Nama Usaha -->
                        <p class="text-muted">
                            <strong>Name :</strong>
                            <span class="ms-2">{{ $usaha->nama_usaha }}</span>
                        </p>

                        <!-- Kategori Usaha -->
                        <p class="text-muted">
                            <strong>Kategori Usaha :</strong>
                            <span class="ms-2">{{ $usaha->kategoriUmkm->nama }}</span>
                        </p>

                        <!-- Lokasi Usaha -->
                        <div class="location-info">
                            <div class="row text-muted ">
                                <div class="col-sm-7">
                                    <p><i class="mdi mdi-map-marker-outline"></i> <strong>Provinsi:</strong>
                                        {{$usaha->kelurahan->kecamatan->kabupatenKota->provinsi->nama}}</p>
                                    <p><i class="mdi mdi-city"></i> <strong>Kabupaten/Kota:</strong>
                                        {{$usaha->kelurahan->kecamatan->kabupatenKota->nama}}</p>
                                    <p><i class="mdi mdi-city-variant-outline"></i> <strong>Kecamatan:</strong>
                                        {{$usaha->kelurahan->kecamatan->nama}}</p>
                                    <p><i class="mdi mdi-home-city-outline"></i> <strong>Kelurahan:</strong>
                                        {{$usaha->kelurahan->nama}}</p>
                                    <p><i class="mdi mdi-sign-direction"></i> <strong>RT/RW:</strong> {{$usaha->rt}} /
                                        {{$usaha->rw}}</p>
                                    <p><i class="mdi mdi-office-building-marker-outline"></i> <strong>Alamat
                                            Lengkap:</strong> {{$usaha->alamat_usaha}}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Aksi: Tombol Maps dan Lihat Lengkap -->
                        <div class="mt-3">
                            <a href="{{$usaha->kordinat_usaha}}" target="_blank"
                                class="btn btn-outline-primary btn-sm me-2">
                                <i class="mdi mdi-map-marker-outline"></i> Lihat di Maps
                            </a>

                            <a href="{{ route('detail.umkm', [
                                'nama_kecamatan' => $usaha->kelurahan->kecamatan->nama,
                                'nama_usaha' => $usaha->nama_usaha,
                                'id' => $usaha->id
                            ]) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="mdi mdi-eye-outline"></i> Lihat Lengkap
                            </a>

                        </div>

                    </div>
                </div>
            </div>
            <!-- End Business-Information -->


            <!-- Media Sosial Card -->
            <div class="card text-white bg-info ms-3" style="max-height: 300px; overflow-y: auto;">
                <div class="card-body">
                    <h4 class="card-title text-white">Media Sosial</h4>
                    <p class="text-muted mb-0" id="tooltip-container"></p>

                    <div class="d-flex justify-content-start flex-column mt-3">
                        <div class="d-flex flex-wrap gap-1 justify-content-start">
                            @if($mediaSocialLinks['facebook']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['facebook']['url'] }}" title="Facebook">
                                <i class="mdi mdi-facebook"></i> Facebook
                            </a>
                            @endif

                            @if($mediaSocialLinks['twitter']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['twitter']['url'] }}" title="Twitter">
                                <i class="mdi mdi-twitter"></i> Twitter
                            </a>
                            @endif

                            @if($mediaSocialLinks['instagram']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['instagram']['url'] }}" title="Instagram">
                                <i class="mdi mdi-instagram"></i> Instagram
                            </a>
                            @endif

                            @if($mediaSocialLinks['youtube']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['youtube']['url'] }}" title="YouTube">
                                <i class="mdi mdi-youtube"></i> YouTube
                            </a>
                            @endif

                            @if($mediaSocialLinks['linkedin']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['linkedin']['url'] }}" title="LinkedIn">
                                <i class="mdi mdi-linkedin"></i> LinkedIn
                            </a>
                            @endif

                            @if($mediaSocialLinks['tiktok']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['tiktok']['url'] }}" title="TikTok">
                                <i class="mdi mdi-tiktok"></i> TikTok
                            </a>
                            @endif

                            @if($mediaSocialLinks['telegram']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['telegram']['url'] }}" title="Telegram">
                                <i class="mdi mdi-telegram"></i> Telegram
                            </a>
                            @endif

                            @if($mediaSocialLinks['discord']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['discord']['url'] }}" title="Discord">
                                <i class="mdi mdi-discord"></i> Discord
                            </a>
                            @endif

                            @if($mediaSocialLinks['github']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['github']['url'] }}" title="GitHub">
                                <i class="mdi mdi-github"></i> GitHub
                            </a>
                            @endif

                            @if($mediaSocialLinks['medium']['show'])
                            <a class="btn btn-light btn-sm social-btn" data-bs-container="#tooltip-container"
                                data-bs-placement="top" data-bs-toggle="tooltip"
                                href="{{ $mediaSocialLinks['medium']['url'] }}" title="Medium">
                                <i class="mdi mdi-medium"></i> Medium
                            </a>
                            @endif
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->


            <!-- Messages-->
            {{-- <div class="card ms-3">
                <div class="card-body">
                    <h4 class="header-title mb-3">Messages</h4>

                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg"
                                    class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Tomaslau</p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg"
                                    class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Stillnotdavid</p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg"
                                    class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Kurafire</p>
                            <p class="inbox-item-text">Nice to meet you</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>

                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg"
                                    class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Shahedk</p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg"
                                    class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Adhamdannaway</p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                            </p>
                        </div>
                    </div> <!-- end inbox-widget -->
                </div> <!-- end card-body-->
            </div> <!-- end card--> --}}

        </div> <!-- end col-->

        <div class="col-xl-8">

            <div class="row me-2">
                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="dripicons-basket float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Total Produk</h6>
                            <h2 class="m-b-20">1,587</h2>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div><!-- end col -->

                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="dripicons-star float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Rating</h6>
                            <h2 class="m-b-20"><span>46,782</span></h2>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div><!-- end col -->

                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="dripicons-cart float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">sdsadas</h6>
                            <h2 class="m-b-20">1,890</h2>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div><!-- end col -->
            </div>

            <!-- end row -->


            <div class="card me-3">
                <div class="card-body">
                    <h4 class="header-title mb-3">My Products</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ASOS Ridley High Waist</td>
                                    <td>$79.49</td>
                                    <td><span class="badge bg-primary">82 Pcs</span></td>
                                    <td>$6,518.18</td>
                                </tr>
                                <tr>
                                    <td>Marco Lightweight Shirt</td>
                                    <td>$128.50</td>
                                    <td><span class="badge bg-primary">37 Pcs</span></td>
                                    <td>$4,754.50</td>
                                </tr>
                                <tr>
                                    <td>Half Sleeve Shirt</td>
                                    <td>$39.99</td>
                                    <td><span class="badge bg-primary">64 Pcs</span></td>
                                    <td>$2,559.36</td>
                                </tr>
                                <tr>
                                    <td>Lightweight Jacket</td>
                                    <td>$20.00</td>
                                    <td><span class="badge bg-primary">184 Pcs</span></td>
                                    <td>$3,680.00</td>
                                </tr>
                                <tr>
                                    <td>Marco Shoes</td>
                                    <td>$28.49</td>
                                    <td><span class="badge bg-primary">69 Pcs</span></td>
                                    <td>$1,965.81</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table responsive-->
                </div> <!-- end col-->
            </div> <!-- end row-->

        </div>
        <!-- end col -->

    </div>
    <!-- end row -->
</div>
@endsection

@section('styles')
<!-- Custom CSS for Hover Effect -->
<style>
    .social-btn {
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;

    }

    .social-btn:hover {
        background-color: #ffffff;
        color: #0d6efd;
        transform: scale(1.05);
    }

    .social-btn i {
        transition: color 0.3s ease;
    }

    .social-btn:hover i {
        color: #0d6efd;
        /* Warna ikon saat di-hover */
    }
</style>

@endsection