@extends('layouts.backend')

@section('content')
    @php
        use Carbon\Carbon;
        $umur = Carbon::parse($personalData->tanggal_lahir)->age;
    @endphp
    <div class="container">
        <h2 class="mb-4">Detail Personal Data</h2>

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Personal Data {{ $personalData->nama_lengkap }}</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $personalData->nama_lengkap }}</li>
                    <li class="list-group-item"><strong>NIK:</strong> {{ $personalData->nik }}</li>
                    <li class="list-group-item"><strong>Tempat Lahir:</strong> {{ $personalData->tempat_lahir }}</li>
                    <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{ $personalData->tanggal_lahir }}</li>
                    <li class="list-group-item"><strong>Umur:</strong> {{ $umur }} tahun</li>
                    <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $personalData->jenis_kelamin }}</li>
                    <li class="list-group-item"><strong>Nomor Telepon:</strong> {{ $personalData->nomor_telepon }}</li>
                    <li class="list-group-item"><strong>Provinsi:</strong> {{ $personalData->provinsi->nama ?? '-' }}</li>
                    <li class="list-group-item"><strong>Kabupaten/Kota:</strong> {{ $personalData->kabupatenKota->nama ?? '-' }}</li>
                    <li class="list-group-item"><strong>Kecamatan:</strong> {{ $personalData->kecamatan->nama ?? '-' }}</li>
                    <li class="list-group-item"><strong>Kelurahan:</strong> {{ $personalData->kelurahan->nama ?? '-' }}</li>
                    <li class="list-group-item"><strong>Alamat:</strong> {{ $personalData->alamat }}</li>
                </ul>

                <div class="mt-4">
                    <a href="{{ route('personal_data.list') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
