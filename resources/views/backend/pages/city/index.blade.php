@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Daftar Kabupaten/Kota</h1>
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('kabupaten_kota.create') }}" class="btn btn-success">Tambah Kabupaten/Kota</a>
        </div>
        
        @if($kabupatenKotas->isEmpty())
            <div class="alert alert-warning">Tidak ada data kabupaten/kota tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kabupaten/Kota</th>
                        <th>Provinsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kabupatenKotas as $index => $kabupatenKota)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kabupatenKota->nama }}</td>
                            <td>{{ $kabupatenKota->provinsi->nama }}</td>
                            <td>
                                <form action="{{ route('kabupaten_kota.destroy', $kabupatenKota->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kabupaten/kota ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('kabupaten_kota.edit', $kabupatenKota->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
