@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Detail Usaha: {{ $usaha->nama_usaha }}</h4>
            <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong> {{ $usaha->deskripsi_usaha }}</p>
            <p><strong>Kategori:</strong> {{ $usaha->kategoriUmkm->nama }}</p>
            <p><strong>Alamat:</strong> {{ $usaha->alamat_usaha }}</p>
            <p><strong>Pemilik:</strong> {{ optional($usaha->user->personalData)->nama_lengkap }}</p>
            <!-- Tambahkan detail lain yang diperlukan -->
        </div>
    </div>
</div>
@endsection
