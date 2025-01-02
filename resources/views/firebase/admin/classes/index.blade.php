@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="display-6 text-primary">Manage Classes</h1>
            <a href="{{ route('classes.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle me-2"></i> Add Class
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
                        <th scope="col">Class Name</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Section</th>
                        <th scope="col">Teacher</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($classes))
                    @foreach($classes as $id => $class)
                    <tr>
                        <td>{{ ucfirst($id) }}</td>
                        <td>{{ $class['grade'] }}</td>
                        <td>{{ $class['section'] }}</td>
                        <td>{{ $class['teacher'] }}</td>
                        
                        <td class="text-center">
                            <a href="{{ route('classes.edit', $id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('classes.destroy', $id) }}" method="POST" class="d-inline">
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
                        <td colspan="5" class="py-4 text-center text-muted">No classes available</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
