@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="mt-3">Detail Usaha</h2>
        </div>

        <div class="card-body">
            <!-- Informasi Pemilik Usaha -->
            <h4 class="text-primary">Informasi Pemilik</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama Pemilik:</strong> {{ $usaha->user->personalData->nama_lengkap }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $usaha->user->email }}</li>
            </ul>

            <!-- Informasi Umum Usaha -->
            <h4 class="text-primary mt-4">Informasi Usaha</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama Usaha:</strong> {{ $usaha->nama_usaha }}</li>
                <li class="list-group-item"><strong>NIB:</strong> {{ $usaha->nib ?? 'Tidak tersedia' }}</li>
                <li class="list-group-item"><strong>Deskripsi Usaha:</strong> {{ $usaha->deskripsi_usaha }}</li>
                <li class="list-group-item"><strong>Kategori UMKM:</strong> {{ $usaha->kategoriUmkm->nama }}</li>
                <li class="list-group-item"><strong>Tanggal Berdiri:</strong> {{ $usaha->tanggal_berdiri }}</li>
                <li class="list-group-item"><strong>Alamat Usaha:</strong> {{ $usaha->alamat_usaha }}, RT {{ $usaha->rt }}, RW {{ $usaha->rw }}, {{ $usaha->kelurahan->nama }}, {{ $usaha->kecamatan->nama }}, {{ $usaha->kabupatenKota->nama }}, {{ $usaha->provinsi->nama }}</li>
                <li class="list-group-item">
                    <strong>Koordinat Usaha:</strong> 
                    <a href="{{ $usaha->kordinat_usaha }}" target="_blank">{{ $usaha->kordinat_usaha }}</a>
                </li>
            </ul>

            <!-- Informasi Keuangan Usaha -->
            @if($usaha->keuangan)
            <h4 class="text-primary mt-4">Informasi Keuangan</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Modal Usaha:</strong> {{ $usaha->keuangan->modal_usaha ?? 'Tidak tersedia' }}</li>
                <li class="list-group-item"><strong>Aset Usaha:</strong> {{ $usaha->keuangan->asset_usaha ?? 'Tidak tersedia' }}</li>
                <li class="list-group-item"><strong>Penghasilan Bulanan:</strong> {{ $usaha->keuangan->penghasilan_bulanan ?? 'Tidak tersedia' }}</li>
                <li class="list-group-item"><strong>Jumlah Tenaga Kerja:</strong> {{ $usaha->keuangan->jumlah_tenaga_kerja ?? 'Tidak tersedia' }}</li>
            </ul>
            @else
            <p class="text-muted">Informasi keuangan tidak tersedia.</p>
            @endif

            <!-- Tombol Aksi -->
            <div class="mt-4">
                <a href="{{ route('usaha.list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
