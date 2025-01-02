@extends('firebase.app')

@section('content')

    <div class="container mt-5">
        <a href="{{ route('contacts') }}" class="float-right mb-4 btn btn-lg btn-danger" style="float: right">
            <i class="fas fa-plus"></i>Back
        </a>
        <h1>Edit User</h1>
        <hr>
        <form action="{{ route('firebase.updateUser', $key) }}"  method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" name="first_name" value="{{ $editData['fname'] }}" id="fname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" name="last_name" value="{{ $editData['lname'] }}" id="fname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" name="phone" value="{{ $editData['phone'] }}" id="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ $editData['email'] }}" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    @endsection
