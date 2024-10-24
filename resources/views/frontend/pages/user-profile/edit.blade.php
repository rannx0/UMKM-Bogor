@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-start">

        <!-- Form Edit Profile -->
        <div class="col-lg">
            <div class="card shadow-sm border-0 rounded">
                <!-- Foto Sampul -->
                <img src="{{ asset('storage/profiles/' . Auth::id() . '/' . $profile->foto_sampul) }}"
                    class="card-img-top" alt="Foto Sampul"
                    style="object-fit: cover; height: 250px; border-top-left-radius: .25rem; border-top-right-radius: .25rem;">

                <!-- Profil dan Bio -->
                <div class="card-body text-start">
                    <!-- Foto Profil Bulat -->
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/profiles/' . Auth::id() . '/' . $profile->foto_profil) }}"
                            class="rounded-circle img-thumbnail" alt="Foto Profil"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    </div>

                    <!-- Nama Pengguna -->
                    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                    <p class="card-text text-center text-muted">{{ $profile->bio }}</p>
                </div>
            </div>

            <div class="card mt-4 shadow-sm border-0 rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Profil</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Foto Profil -->
                            <div class="col-md-6 mb-4">
                                <label for="foto_profil" class="form-label">Foto Profil</label>
                                <input type="file" name="foto_profil" class="form-control"
                                    onchange="previewImage('foto_profil_preview', this)">

                                <!-- Gambar Preview -->
                                <img id="foto_profil_preview" class="rounded-circle img-thumbnail mb-2" width="150"
                                    style="display: none;" alt="Preview Foto Profil">
                                <!-- Tombol Hapus Foto Preview -->
                                <div class="d-flex justify-content-center mt-2">
                                    <button type="button" class="btn btn-danger btn-sm me-2"
                                        onclick="deletePreviewImage('foto_profil_preview')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                            </div>

                            <!-- Foto Sampul -->
                            <div class="col-md-6 mb-4">
                                <label for="foto_sampul" class="form-label">Foto Sampul</label>
                                <input type="file" name="foto_sampul" class="form-control"
                                    onchange="previewImage('foto_sampul_preview', this)">

                                <!-- Gambar Preview -->
                                <img id="foto_sampul_preview" class="img-thumbnail mb-2" width="100%"
                                    style="display: none;" alt="Preview Foto Sampul">
                                <!-- Tombol Hapus Foto Preview -->
                                <div class="d-flex justify-content-center mt-2">
                                    <button type="button" class="btn btn-danger btn-sm me-2"
                                        onclick="deletePreviewImage('foto_sampul_preview')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Field untuk nama user -->
                        <div class="form-group mb-4">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                        </div>

                        <!-- Bio -->
                        <div class="form-group mb-4">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea name="bio" class="form-control" rows="3">{{ $profile->bio }}</textarea>
                        </div>

                        <!-- Website -->
                        <div class="form-group mb-4">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" name="website" class="form-control" value="{{ $profile->website }}">
                        </div>
                        <div class="row">
                            @foreach (['instagram', 'facebook', 'twitter', 'linkedin', 'youtube', 'tiktok', 'telegram',
                            'discord', 'github', 'medium'] as $index => $social)
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm border-0 rounded">
                                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">{{ ucfirst($social) }}</h6>
                                        <!-- Switch untuk Menampilkan atau Menyembunyikan -->
                                        <div class="form-check form-switch mb-0">
                                            <input type="checkbox" name="show_{{ $social }}" class="form-check-input"
                                                id="switch{{ $index }}" data-switch="primary" {{ $profile->$social ?
                                            'checked' : '' }}>
                                            <label for="switch{{ $index }}" class="form-check-label" data-on-label="On"
                                                data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Input URL untuk Sosial Media -->
                                        <div class="form-group mt-3">
                                            <input type="url" name="{{ $social }}" class="form-control"
                                                placeholder="Masukkan URL {{ ucfirst($social) }}"
                                                value="{{ $profile->$social }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Tombol Simpan -->
                        <div>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- JavaScript for preview and delete functionality -->
<script>
    // Preview gambar baru yang akan diunggah
    function previewImage(previewId, input) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Menghapus preview gambar
    function deletePreviewImage(previewId) {
        const preview = document.getElementById(previewId);
        preview.style.display = 'none'; // Sembunyikan preview gambar
        const inputFile = document.querySelector(`input[name="${previewId.replace('_preview', '')}"]`);
        if (inputFile) {
            inputFile.value = ''; // Reset input file
        }
    }
</script>
@endsection