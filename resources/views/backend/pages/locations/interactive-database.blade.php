@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Data Lokasi</h1>

        <h2>Provinsi</h2>
        @if($provinsis->isEmpty())
            <div class="alert alert-warning">Tidak ada data provinsi tersedia.</div>
        @else
            <table class="table table-bordered table-striped mb-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Provinsi</th>
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

        <h2>Kabupaten/Kota</h2>
        @if($kabupatenKotas->isEmpty())
            <div class="alert alert-warning">Tidak ada data kabupaten/kota tersedia.</div>
        @else
            <table class="table table-bordered table-striped mb-4">
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

        <h2>Kecamatan</h2>
        @if($kecamatans->isEmpty())
            <div class="alert alert-warning">Tidak ada data kecamatan tersedia.</div>
        @else
            <table class="table table-bordered table-striped mb-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten/Kota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kecamatans as $index => $kecamatan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kecamatan->nama }}</td>
                            <td>{{ $kecamatan->kabupatenKota->nama }}</td>
                            <td>
                                <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kecamatan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('kecamatan.edit', $kecamatan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <h2>Kelurahan</h2>
        @if($kelurahans->isEmpty())
            <div class="alert alert-warning">Tidak ada data kelurahan tersedia.</div>
        @else
            <table class="table table-bordered table-striped mb-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelurahans as $index => $kelurahan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kelurahan->nama }}</td>
                            <td>{{ $kelurahan->kecamatan->nama }}</td>
                            <td>
                                <form action="{{ route('kelurahan.destroy', $kelurahan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelurahan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('kelurahan.edit', $kelurahan->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
