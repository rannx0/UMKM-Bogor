@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Daftar Pengguna Ditolak</h2>
    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary mb-3">Kembali</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alasan Penolakan</th>
                <th>Tanggal Penolakan</th>
                <th>Aksi</th> <!-- Tambahkan kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @forelse($rejectedUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rejection_reason }}</td>
                    <td>{{ $user->rejected_at ? $user->rejected_at->format('d-m-Y') : 'N/A' }}</td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini secara permanen?')">Hapus Permanen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada pengguna yang ditolak.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
