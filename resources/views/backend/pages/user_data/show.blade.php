@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mt-2">Detail User: {{ $user->personalData->nama_lengkap ?? $user->name }}</h2>
        </div>

        <div class="card-body shadow mt-3">
            <!-- Informasi Personal Data -->
            <h4 class="text-primary">Informasi Personal Data</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $user->personalData->nama_lengkap ?? 'Tidak tersedia' }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                <li class="list-group-item"><strong>Nomor Telepon:</strong> {{ $user->personalData->nomor_telepon ?? 'Tidak tersedia' }}</li>
            </ul>

            <!-- Informasi Usaha -->
            <h4 class="text-primary mt-4">Informasi Usaha</h4>
            @if ($user->usaha)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama Usaha:</strong> {{ $user->usaha->nama_usaha }}</li>
                    <li class="list-group-item"><strong>NIB:</strong> {{ $user->usaha->nib ?? 'Tidak tersedia' }}</li>
                    <li class="list-group-item"><strong>Alamat Usaha:</strong> {{ $user->usaha->alamat_usaha }}</li>
                    <li class="list-group-item"><strong>Alamat Lengkap:</strong> {{ $user->usaha->alamat_usaha }}</li>
                    <li class="list-group-item"><strong>kordinat Usaha:</strong> {{ $user->usaha->kordinat_usaha }}</li>
                    <li class="list-group-item"><strong>Kategori Usaha:</strong> {{ $user->usaha->kategoriUmkm->nama }}</li>
                    <li class="list-group-item"><strong>Tanggal Berdiri:</strong> {{ $user->usaha->tanggal_berdiri }}</li>
                    <li class="list-group-item"><strong>Deskripsi Usaha:</strong> {{ $user->usaha->deskripsi_usaha }}</li>
                </ul>

                <!-- Informasi Keuangan -->
                <h4 class="text-primary mt-4">Informasi Keuangan</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Modal Usaha:</strong> {{ $user->usaha->keuangan->modal_usaha ?? 'Tidak tersedia' }}</li>
                    <li class="list-group-item"><strong>Aset Usaha:</strong> {{ $user->usaha->keuangan->asset_usaha ?? 'Tidak tersedia' }}</li>
                    <li class="list-group-item"><strong>Penghasilan Bulanan:</strong> {{ $user->usaha->keuangan->penghasilan_bulanan ?? 'Tidak tersedia' }}</li>
                    <li class="list-group-item"><strong>Jumlah Tenaga Kerja:</strong> {{ $user->usaha->keuangan->jumlah_tenaga_kerja ?? 'Tidak tersedia' }}</li>
                </ul>
            @else
                <p class="text-danger">Usaha tidak ditemukan.</p>
            @endif

            <!-- Tombol kembali -->
            <div class="mt-4">
                <a href="{{ route('userdata.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
