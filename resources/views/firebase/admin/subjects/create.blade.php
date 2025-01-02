@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4">
            <h1 class="text-center display-6 text-success">Add New Subject</h1>
            <p class="text-center text-muted">Fill in the details below to add a new subject to the system.</p>
        </div>

        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('subjects.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter teacher's name" required>
                    </div>

                    <div class="mb-3">
                        <label for="teacher" class="form-label fw-bold">Teacher</label>
                        <input type="text" class="form-control" id="teacher" name="teacher" placeholder="Enter teacher's name" required>
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
