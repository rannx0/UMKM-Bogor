@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Manage About Us Content</h2>
    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $aboutUs->id }}">

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $aboutUs->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $aboutUs->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="focus_points" class="form-label">Focus Points</label>
            <textarea class="form-control" id="focus_points" name="focus_points" rows="4">{{ $aboutUs->focus_points }}</textarea>
        </div>

        <div class="mb-3">
            <label for="commitment" class="form-label">Commitment Text</label>
            <textarea class="form-control" id="commitment" name="commitment" rows="3">{{ $aboutUs->commitment }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">About Us Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($aboutUs->image)
                <img src="{{ asset('storage/'.$aboutUs->image) }}" class="img-thumbnail mt-2" width="200">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection