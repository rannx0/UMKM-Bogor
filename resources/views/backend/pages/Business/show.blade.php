@extends('layouts.backend')

@section('content')
    @php
        use Carbon\Carbon;
        $umur = Carbon::parse($personalData->tanggal_lahir)->age;
    @endphp
    <div class="container">
        <h1>Detail Personal Data</h1>

        <div class="card">
            <div class="card-header">
                Personal Data untuk {{ $personalData->nama_lengkap }}
            </div>
            <div class="card-body">
                <p><strong>Nama Lengkap:</strong> {{ $personalData->nama_lengkap }}</p>
                <p><strong>NIK:</strong> {{ $personalData->nik }}</p>
                <p><strong>Tempat Lahir:</strong> {{ $personalData->tempat_lahir }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $personalData->tanggal_lahir }}</p>
                <p><strong>Umur:</strong> {{ $umur }} tahun</p>
                <p><strong>Jenis Kelamin:</strong> {{ $personalData->jenis_kelamin }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $personalData->nomor_telepon }}</p>
                <p><strong>Provinsi:</strong> {{ $personalData->provinsi->nama ?? '-' }}</p>
                <p><strong>Kabupaten/Kota:</strong> {{ $personalData->kabupatenKota->nama ?? '-' }}</p>
                <p><strong>Kecamatan:</strong> {{ $personalData->kecamatan->nama ?? '-' }}</p>
                <p><strong>Kelurahan:</strong> {{ $personalData->kelurahan->nama ?? '-' }}</p>
                <p><strong>Alamat:</strong> {{ $personalData->alamat }}</p>

                <a href="{{ route('personal_data.list') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
@endsection
