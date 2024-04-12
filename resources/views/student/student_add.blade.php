@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Add New Student</h1>
                    </div>
                    <div class="card-body">
                        @if(session('added'))
                            <script>
                                alert("{{ session('added') }}");
                            </script>
                        @endif
                        <form method="POST" action="{{ route('store.student') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="student_name" class="form-label">Student Name</label>
                                <input type="text" value="{{ old('student_name') }}" class="form-control @error('student_name') is-invalid @enderror" id="student_name" name="student_name" placeholder="John Doe">
                                @error('student_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_email" class="form-label">Student Email</label>
                                <input type="email" value="{{ old('student_email') }}" class="form-control @error('student_email') is-invalid @enderror" id="student_email" name="student_email" placeholder="john.doe@example.com">
                                @error('student_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_mobile_no" class="form-label">Student Mobile</label>
                                <input type="text" pattern="[0-9]+" value="{{ old('student_mobile_no') }}" class="form-control @error('student_mobile_no') is-invalid @enderror" id="student_mobile_no" name="student_mobile_no" placeholder="1234567890">
                                @error('student_mobile_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_address" class="form-label">Student Address</label>
                                <input type="text" value="{{ old('student_address') }}" class="form-control @error('student_address') is-invalid @enderror" id="student_address" name="student_address" placeholder="123 Main St">
                                @error('student_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="student_image" class="form-label">Student Image</label>
                                <input type="file" class="form-control @error('student_image') is-invalid @enderror" id="student_image" name="student_image" placeholder="Choose Image">
                                @error('student_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
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
