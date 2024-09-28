@extends('layouts.backend')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Daftar Lokasi</h1>

        {{-- Tabel Provinsi --}}
        <h2>Provinsi</h2>
        @if($provinsis->isEmpty())
            <div class="alert alert-warning">Tidak ada data provinsi yang tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $noProvinsi = 1; @endphp
                    @foreach($provinsis as $provinsi)
                        <tr>
                            <td>{{ $noProvinsi++ }}</td>
                            <td>{{ $provinsi->nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Tabel Kabupaten/Kota --}}
        <h2>Kabupaten/Kota</h2>
        @if($kabupatenKotas->isEmpty())
            <div class="alert alert-warning">Tidak ada data kabupaten/kota yang tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kabupaten/Kota</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $noKabupatenKota = 1; @endphp
                    @foreach($kabupatenKotas as $kabupatenKota)
                        <tr>
                            <td>{{ $noKabupatenKota++ }}</td>
                            <td>{{ $kabupatenKota->nama }}</td>
                            <td>{{ $kabupatenKota->provinsi->nama ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Tabel Kecamatan --}}
        <h2>Kecamatan</h2>
        @if($kecamatans->isEmpty())
            <div class="alert alert-warning">Tidak ada data kecamatan yang tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten/Kota</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $noKecamatan = 1; @endphp
                    @foreach($kecamatans as $kecamatan)
                        <tr>
                            <td>{{ $noKecamatan++ }}</td>
                            <td>{{ $kecamatan->nama }}</td>
                            <td>{{ $kecamatan->kabupatenKota->nama ?? '-' }}</td>
                            <td>{{ $kecamatan->kabupatenKota->provinsi->nama ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Tabel Kelurahan --}}
        <h2>Kelurahan</h2>
        @if($kelurahans->isEmpty())
            <div class="alert alert-warning">Tidak ada data kelurahan yang tersedia.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten/Kota</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $noKelurahan = 1; @endphp
                    @foreach($kelurahans as $kelurahan)
                        <tr>
                            <td>{{ $noKelurahan++ }}</td>
                            <td>{{ $kelurahan->nama }}</td>
                            <td>{{ $kelurahan->kecamatan->nama ?? '-' }}</td>
                            <td>{{ $kelurahan->kecamatan->kabupatenKota->nama ?? '-' }}</td>
                            <td>{{ $kelurahan->kecamatan->kabupatenKota->provinsi->nama ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
