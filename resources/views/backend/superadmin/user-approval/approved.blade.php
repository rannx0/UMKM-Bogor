@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Daftar Pengguna Disetujui</h2>
    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary mb-3">Kembali</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Persetujuan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($approvedUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->approved_at ? $user->approved_at->format('d-m-Y') : 'Belum Disetujui' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada pengguna yang disetujui.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
