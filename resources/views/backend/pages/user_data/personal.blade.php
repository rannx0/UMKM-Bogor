@extends('layouts.backend')

@section('content')
    @php
        use Carbon\Carbon;
        $umur = Carbon::parse($user->personalData->tanggal_lahir)->age;
    @endphp
    <div class="container">
        <h2 class="mb-4">Detail Personal Data</h2>

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Personal Data {{ $user->personalData->nama_lengkap }}</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $user->personalData->nama_lengkap }}</li>
                    <li class="list-group-item"><strong>NIK:</strong> {{ $user->personalData->nik }}</li>
                    <li class="list-group-item"><strong>Tempat Lahir:</strong> {{ $user->personalData->tempat_lahir }}</li>
                    <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{ $user->personalData->tanggal_lahir }}</li>
                    <li class="list-group-item"><strong>Umur:</strong> {{ $umur }} tahun</li>
                    <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $user->personalData->jenis_kelamin }}</li>
                    <li class="list-group-item"><strong>Nomor Telepon:</strong> {{ $user->personalData->nomor_telepon }}</li>
                    <li class="list-group-item"><strong>Provinsi:</strong> {{ $user->personalData->provinsi->nama ?? '-' }}</li>
                    <li class="list-group-item"><strong>Kabupaten/Kota:</strong> {{ $user->personalData->kabupatenKota->nama ?? '-' }}</li>
                    <li class="list-group-item"><strong>Kecamatan:</strong> {{ $user->personalData->kecamatan->nama ?? '-' }}</li>
                    <li class="list-group-item"><strong>Kelurahan:</strong> {{ $user->personalData->kelurahan->nama ?? '-' }}</li>
                    <li class="list-group-item"><strong>Alamat:</strong> {{ $user->personalData->alamat }}</li>
                </ul>

                <div class="mt-4">
                    <a href="{{ route('userdata.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                </div>
            </div>
        </div>
    </div>
@endsection