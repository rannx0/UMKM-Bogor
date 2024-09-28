@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Tambah Kabupaten/Kota</h1>
        <form action="{{ route('kabupaten_kota.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nama">Nama Kabupaten/Kota</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kabupaten/Kota" required>
            </div>
            <div class="form-group mb-3">
                <label for="provinsi_id">Provinsi</label>
                <select class="form-control" id="provinsi_id" name="provinsi_id" required>
                    <option value="">Pilih Provinsi</option>
                    @foreach($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('kabupaten_kota.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection
