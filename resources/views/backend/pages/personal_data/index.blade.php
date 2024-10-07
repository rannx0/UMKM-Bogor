@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card-header bg-transparent border-primary">
            <h1 class="header-title mt-3">Personal Data List</h1>
    </div>
    <div class="card-body shadow-sm mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Nomor Telepon</th>
                    <th>Lokasi</th> <!-- Gabungan lokasi -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personalData as $data)
                <tr>
                    <td>{{ $data->nama_lengkap }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->nomor_telepon }}</td>
                    <td>
                        <!-- Gabungkan lokasi -->
                        {{ $data->provinsi->nama ?? '-' }}, 
                        {{ $data->kabupatenKota->nama ?? '-' }}, 
                        {{ $data->kecamatan->nama ?? '-' }}, 
                        {{ $data->kelurahan->nama ?? '-' }}
                    </td>
                    <td>
                        <a href="{{ route('personal_data.show', $data->user_id) }}" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
