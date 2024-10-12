@extends('layouts.frontend')

@section('content')
<div class=" mx-5 my-3" id="data-umkm">
    <div class="tab-pane p-3 shadow-lg border border-primary rounded">
        <div class="d-flex justify-content-between mb-3">
            <h2>Data Umkm</h2>
            <a href="javascript:history.back()"><i class="mdi mdi-close-thick" style="font-size: 25px;"></i></a>
        </div>
        <table id="umkm-table" class="table table-hover w-100 nowrap" style="font-size: 13px; color: #333;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kota</th>
                    <th>Kecamatan</th>
                    @foreach($categories as $category)
                    <th>{{ $category->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($kecamatanData as $index => $kecamatan)
                <tr class="text-center" onclick="window.location='{{ route('kecamatan.umkm', ['nama_kecamatan' => Str::slug($kecamatan->nama), 'id' => $kecamatan->id]) }}';"
                    style="cursor: pointer;">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kecamatan->kabupatenKota->nama }}</td>
                    <td class="kecamatan-link">{{ $kecamatan->nama }}</td>
                    @foreach($categories as $category)
                    <td>{{ $kecamatan->usaha->where('umkm_category_id', $category->id)->count() }}</td>
                    @endforeach
                </tr>
                @endforeach

                <tr class="text-center" style="background-color: #d8d8d8;">
                    <th colspan="3">Total</th>
                    <th class="d-none">0</th>
                    <th class="d-none">0</th>
                    @foreach($categories as $category)
                    <th>{{ $totalUmkmPerCategory[$category->id] ?? 0 }}</th>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('styles')
<style>
    .kecamatan-link {
        color: #007bff;
        cursor: pointer;
    }

    .kecamatan-link:hover {
        color: #0056b3;
    }
</style>
@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        $('#umkm-table').DataTable({
            paging: true, // Pagination
            searching: true, // Searching
            ordering: false, // Sorting
            fixedFooter: true,
            fixedHeader: true,
            scrollX: true,
            responsive: true,
            autoWidth: true
        });
    });
</script>
@endsection