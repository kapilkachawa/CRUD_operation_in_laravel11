<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
    <section class="container">
        <header>Registration Form</header>
        <form action="{{ route('registration.post') }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf

            <div class="input-box">
                <label>Student Full Name</label>
                <input type="text" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter full name" name="name" />
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-box">
                <label>Student Email Address</label>
                <input type="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address" name="email" />
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-box">
                <label>Student Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" />
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button>Submit</button>
            <div class="text">
                <h3>Already have an account? <a href="{{ route('user.login') }}">Login now</a></h3>
            </div>
        </form>
    </section>
</body>
</html>
