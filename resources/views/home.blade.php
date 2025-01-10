@extends('layouts.admin.app')

@section('content')
<div id="main" class="p-4 main bg-light">

    <div class="container">
        <div class="row justify-content-center">
            {{-- <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div> --}}
            <form action="{{ route('send.email.all') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Send Email to All Students</button>
            </form>

            <form action="{{ route('send.email.student') }}" method="POST">
                @csrf
                <input type="hidden" name="class_id" value="{{ $classId }}">
                <input type="hidden" name="student_id" value="{{ $studentId }}">
                <textarea name="message" placeholder="Enter your message"></textarea>
                <button type="submit" class="btn btn-primary">Send Email to This Student</button>
            </form>

        </div>
    </div>
</div>
@endsection
