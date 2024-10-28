@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Daftar Pengguna Menunggu Persetujuan</h2>

    
    <!-- Tombol Navigasi -->
    <div class="mb-4">
        <a href="{{ route('user-approval.approved') }}" class="btn btn-sm btn-primary ">Lihat Pengguna Disetujui</a>
        <a href="{{ route('user-approval.rejected') }}" class="btn btn-sm btn-secondary ">Lihat Pengguna Ditolak</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Registrasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                    <td>
                        <form action="{{ route('user-approval.approve', $user->id) }}" method="POST" style="display:inline;" class="approve-form">
                            @csrf
                            @method('POST')
                            <button type="button" class="btn btn-success approve-btn">Setujui</button>
                        </form>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $user->id }}">
                            Tolak
                        </button>
                    
                        <!-- Modal Tolak -->
                        <div class="modal fade" id="rejectModal-{{ $user->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tolak Pengguna</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user-approval.reject', $user->id) }}" method="POST" class="reject-form">
                                            @csrf
                                            @method('POST')
                                            <div class="mb-3">
                                                <label for="reason" class="form-label">Alasan Penolakan</label>
                                                <textarea name="reason" id="reason" class="form-control" required></textarea>
                                            </div>
                                            <button type="button" class="btn btn-danger reject-btn">Tolak Pengguna</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada pengguna yang menunggu persetujuan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.approve-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyetujui pengguna ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Sedang memproses...',
                        text: 'Silakan tunggu...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form
                    form.submit();
                }
            });
        });
    });

    document.querySelectorAll('.reject-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form');
            const reason = form.querySelector('textarea[name="reason"]').value;

            if (reason.trim() === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Alasan penolakan harus diisi!',
                });
                return;
            }

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menolak pengguna ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, tolak!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Sedang memproses...',
                        text: 'Silakan tunggu...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
