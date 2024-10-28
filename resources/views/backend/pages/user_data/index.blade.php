@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card-header bg-transparent border-primary">
        <h1 class="header-title mt-3">Daftar User yang Telah Disetujui</h1>
    </div>

    <div class="card-body shadow-sm mt-3">
        <table id="userData" class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">ID</th>
                    <th class="text-nowrap">Nama Lengkap</th>
                    <th class="text-nowrap">Username</th>
                    <th class="text-nowrap">Email</th>
                    <th class="text-nowrap">Data Pribadi</th>
                    <th class="text-nowrap">Data Profil</th>
                    <th class="text-nowrap">Data Usaha</th>
                    <th class="text-nowrap">Hapus User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td class="text-nowrap">{{ $index + 1 }}</td>
                        <td class="text-nowrap">{{ $user->id }}</td>
                        <td class="text-nowrap">{{ $user->personalData->nama_lengkap ?? 'Belum diisi' }}</td>
                        <td class="text-nowrap">{{ $user->name }}</td>
                        <td class="text-nowrap">{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('userdata.personalData', $user->id) }}" class="btn btn-primary btn-sm rounded-pill px-3 py-1">
                                <i class="bi bi-eye-fill"></i> Lihat
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('userdata.profile', $user->id) }}" class="btn btn-secondary btn-sm rounded-pill px-3 py-1">
                                <i class="bi bi-person-fill"></i> Lihat
                            </a>
                        </td>
                        <td class="text-center">
                            @if($user->usaha)
                                <a href="{{ route('userdata.usaha', $user->id) }}" class="btn btn-info btn-sm rounded-pill px-3 py-1">
                                    <i class="bi bi-briefcase-fill"></i> Lihat
                                </a>
                            @else
                                <span class="text-muted fst-italic">Belum diisi</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('userdata.show', $user->id) }}" class="btn btn-danger btn-sm rounded-pill px-3 py-1">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#userData').DataTable({
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
