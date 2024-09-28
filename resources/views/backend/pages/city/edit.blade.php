@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Edit Kabupaten/Kota</h1>
        <form action="{{ route('kabupaten_kota.update', $kabupatenKota->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nama">Nama Kabupaten/Kota</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kabupatenKota->nama }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="provinsi_id">Provinsi</label>
                <select class="form-control" id="provinsi_id" name="provinsi_id" required>
                    @foreach($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}" {{ $kabupatenKota->provinsi_id == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection
