@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Student Details</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="card-body">
                                @foreach ($data as $user)
                                    <div class="mb-4">
                                        <h5 class="card-title mb-2">Name</h5>
                                        <p class="card-text text-primary">{{ $user->student_name }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-2">Email</h5>
                                        <p class="card-text text-info">{{ $user->student_email }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-2">Mobile No.</h5>
                                        <p class="card-text text-success">{{ $user->student_mobile_no }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-2">Address</h5>
                                        <p class="card-text text-warning">{{ $user->student_address }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/' . $user->student_image) }}" class="img-fluid rounded" alt="Student Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3 text-center">
        <a href="{{ route('student') }}" class="btn btn-success">Back to Student Dashboard</a>
    </div>
@endsection
