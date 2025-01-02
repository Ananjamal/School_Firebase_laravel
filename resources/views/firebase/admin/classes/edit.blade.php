@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4">
            <h1 class="text-center display-6 text-primary">Edit Class</h1>
            <p class="text-center text-muted">Update the class details below.</p>
        </div>

        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('classes.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <input
                            type="text"
                            class="form-control @error('grade') is-invalid @enderror"
                            id="grade"
                            name="grade"
                            placeholder="Enter the grade"
                            value="{{ $class['grade'] }}"
                            required>
                        @error('grade')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <input
                            type="text"
                            class="form-control @error('section') is-invalid @enderror"
                            id="section"
                            name="section"
                            placeholder="Enter the section"
                            value="{{  $class['section'] }}"
                            required>
                        @error('section')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="teacher" class="form-label">Teacher</label>
                        <input
                            type="text"
                            class="form-control @error('teacher') is-invalid @enderror"
                            id="teacher"
                            name="teacher"
                            placeholder="Enter the teacher's name"
                            value="{{  $class['teacher'] }}"
                            required>
                        @error('teacher')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-pencil me-2"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
