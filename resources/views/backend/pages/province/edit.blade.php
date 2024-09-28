<!-- Edit an existing provinsi -->
@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Provinsi</h1>

        <form action="{{ route('provinsi.update', $provinsi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nama">Nama Provinsi</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Provinsi" value="{{ old('nama', $provinsi->nama) }}" required>

                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
