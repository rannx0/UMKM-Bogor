@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Daftar Kategori UMKM</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('umkm-categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($categories->isEmpty())
            <div class="alert alert-warning">Tidak ada kategori UMKM yang tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->nama }}</td>
                            <td>
                                <a href="{{ route('umkm-categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('umkm-categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
