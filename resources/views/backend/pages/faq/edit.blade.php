<!-- resources/views/backend/pages/faq/edit.blade.php -->
@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Edit FAQ</h2>

    <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}" required>
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="5" required>{{ $faq->answer }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
