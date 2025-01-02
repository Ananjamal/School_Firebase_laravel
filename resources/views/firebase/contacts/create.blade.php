@extends('firebase.app')

@section('content')

    <div class="container mt-5">
        <a href="{{ route('contacts') }}" class="float-right mb-4 btn btn-lg btn-danger" style="float: right">
            <i class="fas fa-plus"></i>Back
        </a>
        <h1>Add User</h1>
        <hr>
        <form action="{{ route('firebase.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" name="first_name" id="fname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="fname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>

    @endsection
