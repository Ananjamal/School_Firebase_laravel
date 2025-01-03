@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">
    <div class="container">
        <div class="mb-4">
            <h1 class="text-center display-6 text-primary">Edit Staff</h1>
            <p class="text-center text-muted">Update the Staff details below.</p>
        </div>

        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('staff.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{$staff['name']}}" placeholder="Enter the staff name" required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control @error('role') is-invalid @enderror" id="role"
                            name="role" placeholder="Enter the staff's role"
value="{{$staff['role']}}"
                            {{-- value="{{ old('section') }}" --}}
                            required>
                        @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Enter the saff's email"
                            value="{{$staff['contact']['email']}}"
                            {{-- value="{{ old('teacher') }}" --}}
                            required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone"
                            value="{{$staff['contact']['phone']}}"

                            placeholder="Enter the saff's phone" required>
                        @error('phone')
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
