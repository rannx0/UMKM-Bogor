@extends('layouts.backend')

@section('title', 'User Permissions')

@section('content')
<div class="container">
    <h2 class="header-title mt-3">User Permissions</h2>
    <div class="row">
        <div class="col-md-12">
            <table id="basic-datatable" class="table table-striped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                <ul>
                                    @foreach($permissions[$user->id] as $permission)
                                        <li>{{ $permission->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection