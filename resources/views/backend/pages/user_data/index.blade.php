@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card-header bg-transparent border-primary">
        <h1 class="header-title mt-3">Daftar User</h1>
    </div>

    <div class="card-body shadow-sm mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nama Lengkap</th>
                    <th>Usaha</th>
                    <th>Keuangan</th>
                    <th>All</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->personalData->nama_lengkap ?? $user->name }}</td>
                        <td>
                            @if($user->usaha)
                                <a href="{{ route('userdata.usaha', $user->id) }}" class="btn btn-info">Lihat Usaha</a>
                            @else
                                <span class="text-muted">Belum diisi</span>
                            @endif
                        </td>
                        <td>
                            @if($user->usaha && $user->usaha->keuangan)
                                <a href="{{ route('userdata.keuangan', $user->id) }}" class="btn btn-info">Lihat Keuangan</a>
                            @else
                                <span class="text-muted">Belum diisi</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('userdata.show', $user->id) }}" class="btn btn-info">Show All</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
