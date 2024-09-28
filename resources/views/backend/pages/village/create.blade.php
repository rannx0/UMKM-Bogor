@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Tambah Kelurahan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kelurahan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kelurahan</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label for="kecamatan_id" class="form-label">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan_id" class="form-select" required>
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}" {{ old('kecamatan_id') == $kecamatan->id ? 'selected' : '' }}>
                            {{ $kecamatan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kelurahan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
