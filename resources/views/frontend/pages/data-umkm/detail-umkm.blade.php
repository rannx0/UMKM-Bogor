@extends('layouts.frontend')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Detail Usaha: {{ $usaha->nama_usaha }}</h4>
                    <a href="javascript:history.back()" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Pemilik:</strong></div>
                        <div class="col-md-8">{{ optional($usaha->user->personalData)->nama_lengkap }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>No Telepon:</strong></div>
                        <div class="col-md-8">{{ optional($usaha->user->personalData)->nomor_telepon }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Deskripsi:</strong></div>
                        <div class="col-md-8">{{ $usaha->deskripsi_usaha }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Kategori:</strong></div>
                        <div class="col-md-8">{{ $usaha->kategoriUmkm->nama }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Provinsi:</strong></div>
                        <div class="col-md-8">{{ $usaha->provinsi->nama }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Kota:</strong></div>
                        <div class="col-md-8">{{ $usaha->kabupatenKota->nama }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Kecamatan:</strong></div>
                        <div class="col-md-8">{{ $usaha->kecamatan->nama }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Kelurahan:</strong></div>
                        <div class="col-md-8">{{ $usaha->kelurahan->nama }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Alamat Lengkap:</strong></div>
                        <div class="col-md-8">{{ $usaha->alamat_usaha }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
