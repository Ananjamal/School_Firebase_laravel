@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="display-6 text-primary">Manage Subjects</h1>
            <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle me-2"></i> Add subject
            </a>
        </div>

        <div class="shadow-sm card">

            <div class="card-body">
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
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Name</th>
                            <th>teacher</th>
                            <th>Class</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($subjects))
                        @foreach($subjects as $classId => $class)
                        @if(!empty($class['subjects']))
                        @foreach($class['subjects'] as $subjectId => $subject)
                        <tr>
                            <td>{{ $subject['name'] }}</td>
                            <td>{{ $subject['teacher'] }}</td>
                            {{-- <td>{{$classId}}</td> --}}
                            <td>{{ $class['grade'] }} - {{ $class['section'] }}</td>
                            <td>
                                <a href="{{ route('subjects.edit', [$classId, $subjectId]) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('subjects.destroy', [$classId, $subjectId]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center text-muted">No subjects in this class.</td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center text-muted">No subjects available.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
