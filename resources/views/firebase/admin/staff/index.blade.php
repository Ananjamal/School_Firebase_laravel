@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="display-6 text-primary">Manage Staff</h1>
            <a href="{{ route('staff.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle me-2"></i> Add Staff
            </a>
        </div>


        <div class="table-responsive">
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
            <table class="table align-middle shadow-sm table-hover table-striped">
                <thead class="table-primary">
                    <tr>
                        <th scope="col"> Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($staff))
                    @foreach($staff as $id => $staff)
                    <tr>
                        {{-- <td>{{ ucfirst($id) }}</td> --}}
                        <td>{{ $staff['name'] }}</td>
                        <td>{{ $staff['role'] }}</td>
                        <td>{{ $staff['contact']['email'] }}</td>

                        <td>{{ $staff['contact']['phone'] }}</td>


                        <td class="text-center">
                            <a href="{{ route('staff.edit', $id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('staff.destroy', $id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="py-4 text-center text-muted">No staff available</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
