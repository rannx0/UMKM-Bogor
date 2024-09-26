@extends('layouts.backend')

@section('content')
<div class="container">
    <h1 class="header-title mt-3">Admin List</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admins.create') }}" class="btn btn-primary my-1">Create Admin</a>
    <div class="card-body shadow-sm mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->roles->pluck('name')->implode(', ') }}</td>
                        <td>
                            <a href="{{ route('admins.edit', $admin) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admins.destroy', $admin) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
