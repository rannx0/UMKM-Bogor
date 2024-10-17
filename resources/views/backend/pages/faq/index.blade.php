@extends('layouts.backend')

@section('content')
<div class="container">
    <h2>Manage FAQs</h2>

    <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">Add New FAQ</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $faq->question }}</td>
                <td>{{ $faq->answer }}</td>
                <td>
                    <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
