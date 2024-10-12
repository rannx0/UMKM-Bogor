@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Daftar UMKM di Kecamatan {{ $kecamatan->nama }}</h3>
            <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body table-responsive">
            @if($umkmData->isEmpty())
            <p>Tidak ada data UMKM di kecamatan ini.</p>
            @else
            <table id="umkm-detail-table" class="table table-hover w-100 nowrap" style="font-size: 13px; color: #333;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemilik</th>
                        <th>Nama Usaha</th>
                        <th>Alamat</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($umkmData as $index => $umkm)
                    <tr onclick="window.location='{{ route('detail.umkm', [
                            'nama_kecamatan' => \Illuminate\Support\Str::slug($umkm->kecamatan->nama),
                            'nama_usaha' => \Illuminate\Support\Str::slug($umkm->nama_usaha),
                            'id' => $umkm->id
                        ]) }}';" style="cursor: pointer;">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ optional($umkm->user->personalData)->nama_lengkap }}</td>
                        <td class="umkm-link">{{ $umkm->nama_usaha }}</td>
                        <td>{{ $umkm->alamat_usaha }}</td>
                        <td>{{ $umkm->kategoriUmkm->nama }}</td>
                        <td>{{ $umkm->deskripsi_usaha }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
@section('styles')
    <style>
        .umkm-link {
            color: #007bff;
            cursor: pointer;
        }
        
        .umkm-link:hover {
            color: #0056b3;
        }
    </style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#umkm-detail-table').DataTable({
            paging: true, // Pagination
            searching: true, // Searching
            ordering: true, // Sorting
            fixedFooter: true,
            fixedHeader: true,
            scrollX: true,
            responsive: true,
            autoWidth: true
        });
    });
</script>
@endsection