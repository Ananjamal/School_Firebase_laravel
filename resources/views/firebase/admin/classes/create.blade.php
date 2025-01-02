@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4">
            <h1 class="text-center display-6 text-primary">Add New Class</h1>
            <p class="text-center text-muted">Fill in the details below to create a new class.</p>
        </div>

        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('classes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <input
                            type="text"
                            class="form-control @error('grade') is-invalid @enderror"
                            id="grade"
                            name="grade"
                            placeholder="Enter the grade"
                            {{-- value="{{ old('grade') }}" --}}
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
                            {{-- value="{{ old('section') }}" --}}
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
                            {{-- value="{{ old('teacher') }}" --}}
                            required>
                        @error('teacher')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-save me-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
