<!-- resources/views/backend/pages/faq/create.blade.php -->
@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Add New FAQ</h2>

    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
