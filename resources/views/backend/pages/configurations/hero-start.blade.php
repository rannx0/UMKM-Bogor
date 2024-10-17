@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Manage Hero Content</h2>
    <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $heroContent->id }}">

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $heroContent->title }}" required>
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $heroContent->subtitle }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $heroContent->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hero Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($heroContent->image)
                <img src="{{ asset('storage/hero/'.$heroContent->image) }}" class="img-thumbnail mt-2" width="200">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
