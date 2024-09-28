@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Daftar Kelurahan</h1>
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('kelurahan.create') }}" class="btn btn-success">Tambah Kelurahan</a>
        </div>
        
        @if($kelurahans->isEmpty())
            <div class="alert alert-warning">Tidak ada data kelurahan tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelurahans as $index => $kelurahan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kelurahan->nama }}</td>
                            <td>{{ $kelurahan->kecamatan->nama }}</td>
                            <td>
                                <form action="{{ route('kelurahan.destroy', $kelurahan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelurahan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('kelurahan.edit', $kelurahan->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
