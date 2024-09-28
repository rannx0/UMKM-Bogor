@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Edit Kategori UMKM</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('umkm-categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nama">Nama Kategori</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $category->nama }}" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('umkm-categories.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
