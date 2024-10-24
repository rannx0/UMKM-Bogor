@extends('layouts.frontend')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="mdi mdi-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('storage/profiles/' . $usaha->user->id . '/' . $profile->foto_profil) }}" class="rounded-circle avatar-lg img-thumbnail"
                        alt="profile-image">

                    <h4 class="mb-0 mt-2">{{ optional($usaha->user->personalData)->nama_lengkap }}</h4>
                    <p class=" font-14">Pemilik {{$usaha->nama_usaha}}</p>

                    <div class="text-start mt-3">
                        {{-- <p class=" mb-3">
                            {{ $usaha->deskripsi_usaha }}
                        </p> --}}
                        <p class=" mb-2"><strong>Owner :</strong> <span class="ms-2">{{ optional($usaha->user->personalData)->nama_lengkap }}</span></p>
                        <p class=" mb-2"><strong>Mobile :</strong><span class="ms-2">{{ optional($usaha->user->personalData)->nomor_telepon }}</span></p>
                        <ul class="">
                            <li><strong>Kelurahan :</strong> {{ $usaha->kelurahan->nama }}</li>
                            <li><strong>Kecamatan :</strong> {{ $usaha->kecamatan->nama }}</li>
                            <li><strong>Kabupaten/Kota :</strong> {{ $usaha->kabupatenKota->nama }}</li>
                            <li><strong>Provinsi :</strong> {{ $usaha->provinsi->nama }}</li>
                        </ul>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Informasi Usaha</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Kategori:</strong>
                            <p>{{ $usaha->kategoriUmkm->nama }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Alamat Lengkap:</strong>
                            <p>{{ $usaha->alamat_usaha }}</p>
                        </div>
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>No Telepon:</strong>
                            <p>{{ optional($usaha->user->personalData)->nomor_telepon }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Deskripsi:</strong>
                            <p>{{ $usaha->deskripsi_usaha }}</p>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
</div>
@endsection