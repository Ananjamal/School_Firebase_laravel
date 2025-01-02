@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4">
            <h1 class="text-center display-6 text-primary">Edit Student</h1>
            <p class="text-center text-muted">Update the student details below.</p>
        </div>

        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('students.update', [$classId, $studentId]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $student['name'] }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label fw-bold">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ $student['age'] }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label fw-bold">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male" {{ $student['gender'] == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $student['gender'] == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="px-4 btn btn-success">
                            <i class="bi bi-save"></i> Update
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
