@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4">
            <h1 class="text-center display-6 text-success">Add New Student</h1>
            <p class="text-center text-muted">Fill in the details below to add a new student to the system.</p>
        </div>

        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter student's name" required>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label fw-bold">Age</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter student's age" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label fw-bold">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="class_id" class="form-label fw-bold">Class</label>
                        <select class="form-control" id="class_id" name="class_id" required>
                            <option value="" disabled selected>Select class</option>
                            @foreach($classes as $id => $class)
                                <option value="{{ $id }}">{{ $class['grade'] }} - {{ $class['section'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="px-4 btn btn-success">
                            <i class="bi bi-save"></i> Save
                        </button>
                        <a href="{{ route('students.index') }}" class="px-4 btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
