@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Daftar Kecamatan</h1>
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('kecamatan.create') }}" class="btn btn-success">Tambah Kecamatan</a>
        </div>

        @if($kecamatans->isEmpty())
            <div class="alert alert-warning">Tidak ada data kecamatan tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten/Kota</th>
                        <th>Provinsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kecamatans as $index => $kecamatan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kecamatan->nama }}</td>
                            <td>{{ $kecamatan->kabupatenKota->nama }}</td>
                            <td>{{ $kecamatan->kabupatenKota->provinsi->nama }}</td>
                            <td>
                                <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kecamatan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('kecamatan.edit', $kecamatan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
