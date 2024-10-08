<!-- Display a list of all provinsi -->
@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Daftar Provinsi</h1>
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('provinsi.create') }}" class="btn btn-success">Tambah Provinsi</a>
        </div>
        
        @if($provinsis->isEmpty())
            <div class="alert alert-warning">Tidak ada data provinsi tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Provinsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($provinsis as $index => $provinsi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $provinsi->nama }}</td>
                            <td>
                                <form action="{{ route('provinsi.destroy', $provinsi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus provinsi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('provinsi.edit', $provinsi->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
