@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Tambah Kecamatan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kecamatan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kecamatan</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label for="kabupaten_kota_id" class="form-label">Kabupaten/Kota</label>
                <select name="kabupaten_kota_id" id="kabupaten_kota_id" class="form-select" required>
                    <option value="">Pilih Kabupaten/Kota</option>
                    @foreach ($kabupatenKotas as $kabupatenKota)
                        <option value="{{ $kabupatenKota->id }}" {{ old('kabupaten_kota_id') == $kabupatenKota->id ? 'selected' : '' }}>
                            {{ $kabupatenKota->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
