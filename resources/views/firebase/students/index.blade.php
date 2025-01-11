@extends('layouts.admin.app')

@section('content')
<div  class="p-4 main bg-light" style="margin-top: 50px"

    <div class="container">
        <h1>All Students</h1>

        <form action="{{ route('send.email.all') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary" style="float: right">Send Emails to All</button>
        </form>

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

        @foreach ($allStudents as $className => $students)
        <h2>{{ ucfirst(str_replace('_', ' ', $className)) }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['email'] }}</td>
                    <td>{{ $student['phone'] }}</td>
                    <td>
                        <form action="{{ route('send.email.student') }}" method="POST">
                            @csrf
                            <input type="hidden" name="class_id" value="{{ $className }}">
                            <input type="hidden" name="student_id" value="{{ $student['id'] }}">
                            <textarea name="message" placeholder="Enter your message" required></textarea>
                            <button type="submit" class="btn btn-primary">Send Email</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $paginatedClasses->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
