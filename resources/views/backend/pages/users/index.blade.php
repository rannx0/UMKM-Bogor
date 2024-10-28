@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card-header bg-transparent border-primary">
        <h1 class="header-title mt-3">Daftar User yang Telah Disetujui</h1>
    </div>

    <div class="card-body shadow-sm mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nama Lengkap</th>
                    <th>Usaha</th>
                    <th>Keuangan</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->personalData->nama_lengkap ?? 'Belum diisi' }}</td>
                        <td>
                            @if($user->usaha)
                                <a href="{{ route('userdata.usaha', $user->id) }}" class="btn btn-info btn-sm">Lihat Usaha</a>
                            @else
                                <span class="text-muted">Belum diisi</span>
                            @endif
                        </td>
                        <td>
                            @if($user->usaha && $user->usaha->keuangan)
                                <a href="{{ route('userdata.keuangan', $user->id) }}" class="btn btn-info btn-sm">Lihat Keuangan</a>
                            @else
                                <span class="text-muted">Belum diisi</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('userdata.personalData', $user->id) }}" class="btn btn-primary btn-sm">Personal Data</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
