@extends('firebase.app')

@section('content')

<div class="container mt-5">
   

    <!-- Page Title -->
    <div class="mb-5 text-center">
        <h1 class="display-4 fw-bold text-primary">Manage Firebase Users</h1>
        <p class="text-muted">View, edit, and manage all users effortlessly</p>
    </div>

    <!-- Add User Button -->
    <div class="mb-4 d-flex justify-content-end">
        <a href="{{ route('firebase.addUser') }}" class="shadow-sm btn btn-lg btn-primary">
            <i class="fas fa-user-plus"></i> Add User
        </a>
    </div>

    <!-- Users Table in a Card -->
    <div class="border-0 shadow-sm card">
        <div class="text-white card-header bg-primary">
            <h5 class="mb-0">Users List</h5>
        </div>
         <!-- Alert Messages -->
    @if(session('success'))
    <div class="shadow alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="shadow alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
        <div class="p-0 card-body">
            <div class="table-responsive">
                <table class="table mb-0 align-middle table-hover table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key }}</td>
                            <td>{{ $item['fname'] }}</td>
                            <td>{{ $item['lname'] }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td class="text-center">
                                <a href="{{ route('firebase.editUser', $key) }}" class="shadow-sm btn btn-sm btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('firebase.deleteUser', $key) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="shadow-sm btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-muted">
                                <i class="fas fa-user-slash fa-2x"></i>
                                <p class="mt-2">No users found</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
