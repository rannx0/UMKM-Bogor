@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Manage About Us Content</h2>
    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $aboutUs->id ?? '' }}">
    
        <!-- Input untuk Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $aboutUs->title ?? '') }}" required>
        </div>
    
        <!-- Input untuk Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $aboutUs->description ?? '') }}</textarea>
        </div>
    
        <!-- Input Focus Points Dinamis -->
        <div class="mb-3">
            <label for="focus_points" class="form-label">Focus Points</label>
            <div id="focus-points-container">
                @php
                    // Decode focus_points dari JSON ke array
                    $focusPoints = json_decode($aboutUs->focus_points ?? '[]', true);
                @endphp
    
                <!-- Loop untuk menampilkan focus points yang sudah ada -->
                @foreach($focusPoints as $focusPoint)
                <div class="input-group mb-2">
                    <input type="text" name="focus_points[]" class="form-control" value="{{ $focusPoint }}" placeholder="Enter focus point">
                    <button type="button" class="btn btn-danger btn-remove-focus-point">Hapus</button>
                </div>
                @endforeach
    
                <!-- Input focus point pertama jika tidak ada data -->
                @if(empty($focusPoints))
                <div class="input-group mb-2">
                    <input type="text" name="focus_points[]" class="form-control" placeholder="Enter focus point">
                    <button type="button" class="btn btn-danger btn-remove-focus-point">Hapus</button>
                </div>
                @endif
            </div>
            <button type="button" class="btn btn-sm btn-success" id="add-focus-point">Tambah Focus Point</button>
        </div>
    
        <!-- Input untuk Commitment -->
        <div class="mb-3">
            <label for="commitment" class="form-label">Commitment</label>
            <textarea name="commitment" class="form-control" rows="2">{{ old('commitment', $aboutUs->commitment ?? '') }}</textarea>
        </div>
    
        <!-- Input untuk Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($aboutUs->image)
            <img src="{{ Storage::url('public/about-us/'.$aboutUs->image) }}" class="img-fluid mt-2" alt="About Us Image" style="max-width: 200px;">
            @endif
        </div>
    
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    // Fungsi untuk menambahkan input focus point baru
    document.getElementById('add-focus-point').addEventListener('click', function () {
        let container = document.getElementById('focus-points-container');
        
        // Buat elemen div baru untuk input focus point dan tombol hapus
        let div = document.createElement('div');
        div.className = 'input-group mb-2';

        // Buat elemen input baru
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'focus_points[]';
        input.className = 'form-control';
        input.placeholder = 'Enter focus point';

        // Buat tombol hapus
        let removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-danger btn-remove-focus-point';
        removeButton.textContent = 'Hapus';

        // Masukkan input dan tombol hapus ke dalam div
        div.appendChild(input);
        div.appendChild(removeButton);

        // Tambahkan div ke container
        container.appendChild(div);

        // Tambahkan event listener untuk tombol hapus
        removeButton.addEventListener('click', function () {
            container.removeChild(div);
        });
    });

    // Event listener untuk tombol hapus di focus points yang sudah ada
    document.querySelectorAll('.btn-remove-focus-point').forEach(function(button) {
        button.addEventListener('click', function() {
            let container = document.getElementById('focus-points-container');
            let parentDiv = button.parentElement;
            container.removeChild(parentDiv);
        });
    });
</script>
@endsection