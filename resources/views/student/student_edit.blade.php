@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Edit Student : {{ $user->student_name }}</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/student_update/{{ $user->id }}/update" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="student_name" class="form-label">Student Name</label>
                                <input type="text" value="{{ old('student_name', $user->student_name) }}" class="form-control @error('student_name') is-invalid @enderror" id="student_name" name="student_name">
                                @error('student_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_email" class="form-label">Student Email</label>
                                <input type="email" value="{{ old('student_email', $user->student_email) }}" class="form-control @error('student_email') is-invalid @enderror" id="student_email" name="student_email">
                                @error('student_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_mobile_no" class="form-label">Student Mobile</label>
                                <input type="text" value="{{ old('student_mobile_no', $user->student_mobile_no) }}" class="form-control @error('student_mobile_no') is-invalid @enderror" id="student_mobile_no" name="student_mobile_no">
                                @error('student_mobile_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_address" class="form-label">Student Address</label>
                                <input type="text" value="{{ old('student_address', $user->student_address) }}" class="form-control @error('student_address') is-invalid @enderror" id="student_address" name="student_address">
                                @error('student_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_image" class="form-label">Student Image</label>
                                <input type="file" class="form-control @error('student_image') is-invalid @enderror" id="student_image" name="student_image">
                                @error('student_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_password" class="form-label">Password</label>
                                <input type="password" value="{{ old('student_password', $user->student_password) }}" class="form-control @error('student_password') is-invalid @enderror" id="student_password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
