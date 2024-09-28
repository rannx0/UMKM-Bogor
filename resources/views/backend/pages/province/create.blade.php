<!-- Create a new provinsi -->
@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Provinsi</h1>
        
        <form action="{{ route('provinsi.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nama">Nama Provinsi</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                @if($errors->has('nama'))
                    <div class="text-danger mt-1">{{ $errors->first('nama') }}</div>
                @endif
            </div>
            
            <div class="d-flex justify-content-end">
                <a href="{{ route('provinsi.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection
