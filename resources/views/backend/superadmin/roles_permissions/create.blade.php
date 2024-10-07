@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h2>Create Admin</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admins.store') }}">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" autocomplete="off" required>
                            </div>
                        </div>

                        <!-- Password Input with Show/Hide -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off" required>
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password Input with Show/Hide -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="role">Pilih Role:</label>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="role-button">
                                        Pilih Role
                                    </button>
                                    <ul class="dropdown-menu w-100">
                                        @foreach ($roles as $role)
                                        <li><a class="dropdown-item" href="#" onclick="document.getElementById('role').value='{{ $role->name }}'; document.getElementById('role-button').textContent='{{ $role->name }}'">{{ $role->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <input type="hidden" name="role" id="role" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" id="cancel-btn" class="btn btn-danger">Back to home</button>
                            <button type="button" id="create-admin-btn" class="btn btn-primary">Create Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('create-admin-btn').addEventListener('click', function(event) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to create a new admin!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6169D0',
            cancelButtonColor: '#D54E69',
            confirmButtonText: 'Yes, Submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                event.target.closest('form').submit();
            }
        });
    });

    // SweetAlert untuk tombol Cancel
    document.getElementById('cancel-btn').addEventListener('click', function(event) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Changes you made may not be saved!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6169D0',
            cancelButtonColor: '#D54E69',
            confirmButtonText: 'Yes, back to home!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika dikonfirmasi, arahkan ke halaman admins.index
                window.location.href = "{{ route('admins.index') }}";
            }
        });
    });
</script>
@endsection