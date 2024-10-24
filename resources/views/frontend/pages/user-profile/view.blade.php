@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <!-- Foto Profil -->
            <div class="card">
                @if($profile->foto_sampul)
                <img src="{{ asset('storage/profiles/' . Auth::id() . '/' . $profile->foto_sampul) }}" alt="Foto Sampul"
                    width="330" class="mx-auto mt-1">
                @else
                <p>Foto sampul belum diunggah.</p>
                @endif
                <div class="card-body text-center">
                    @if($profile->foto_profil)
                    <img src="{{ asset('storage/profiles/' . Auth::id() . '/' . $profile->foto_profil) }}"
                        alt="Foto Profil" width="150">
                    @else
                    <p>Foto profil belum diunggah.</p>
                    @endif
                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    <p class="card-text">{{ $profile->bio }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Informasi Profil -->
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Profil</h4>
                </div>
                <div class="card-body">
                    <p><strong>Bio:</strong> {{ $profile->bio ?? 'Tidak ada bio.' }}</p>
                    <p><strong>Website:</strong> <a href="{{ $profile->website }}" target="_blank">{{ $profile->website
                            ?? 'Tidak ada website' }}</a></p>

                    <!-- Media Sosial -->
                    <p><strong>Instagram:</strong> <a href="{{ $profile->instagram }}" target="_blank">{{
                            $profile->instagram ?? 'Tidak ada Instagram' }}</a></p>
                    <p><strong>Facebook:</strong> <a href="{{ $profile->facebook }}" target="_blank">{{
                            $profile->facebook ?? 'Tidak ada Facebook' }}</a></p>
                    <p><strong>Twitter:</strong> <a href="{{ $profile->twitter }}" target="_blank">{{ $profile->twitter
                            ?? 'Tidak ada Twitter' }}</a></p>
                    <!-- Tambah media sosial lainnya sesuai kebutuhan -->

                    <!-- Tombol Edit -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection