@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card-header bg-transparent border-primary">
        <h1 class="header-title mt-3">Usaha List</h1>
    </div>

    <div class="card-body shadow-sm mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Pemilik</th>
                    <th>Nama Usaha</th>
                    <th>NIB</th>
                    <th>Kategori</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usahaList as $usaha)
                    <tr>
                        <td>{{ $usaha->user->personalData->nama_lengkap }}</td>
                        <td>{{ $usaha->nama_usaha }}</td>
                        <td>{{ $usaha->nib ?? 'N/A' }}</td>
                        <td>{{ $usaha->kategoriUmkm->nama }}</td>
                        <td>{{ $usaha->alamat_usaha }}</td>
                        <td>
                            <a href="{{ route('usaha.show', $usaha->id) }}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah submit form langsung
            const form = this.closest('form'); // Ambil form terdekat dari tombol yang diklik

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika dikonfirmasi
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
