@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card-title mx-3 mt-3">
        <h1>Edit Admin</h1>
    </div>

    <form method="POST" action="{{ route('admins.update', $admin->id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}" required>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $admin->email }}"
                        required>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>
            </div>
            <div class="row col-md-6">
                <div>
                    <label for="role">Pilih Role:</label>
                    <div class="dropdown btn-group m-2">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" id="role-button">
                            {{ $admin->roles->first()->name ?? 'Pilih Role' }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated">
                            @foreach ($roles as $role)
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault(); selectRole('{{ $role->name }}')">
                                    {{ $role->name }}
                                </a>
                            @endforeach
                        </div>
                        <input type="hidden" name="role" id="role" value="{{ $admin->roles->first()->name ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admins.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Admin</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function selectRole(roleName) {
        // Update the button text with the selected role name
        document.getElementById('role-button').textContent = roleName;

        // Update the hidden input value with the selected role name
        document.getElementById('role').value = roleName;
    }
</script>
@endsection