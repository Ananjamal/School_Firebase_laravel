@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="display-6 text-primary">Manage Students</h1>
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle me-2"></i> Add Student
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
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($students))
                            @foreach($students as $classId => $class)
                                @if(!empty($class['students']))
                                    @foreach($class['students'] as $studentId => $student)
                                        <tr>
                                            <td>{{ $student['name'] }}</td>
                                            <td>{{ $student['age'] }}</td>
                                            <td>{{ ucfirst($student['gender']) }}</td>
                                            {{-- <td>{{$classId}}</td> --}}
                                            <td>{{ $class['grade'] }} - {{ $class['section'] }}</td>
                                            <td>
                                                <a href="{{ route('students.edit', [$classId, $studentId]) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('students.destroy', [$classId, $studentId]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                {{-- @else
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No students in this class.</td>
                                    </tr> --}}
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center text-muted">No students available.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
