<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
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


    <header>Login Form</header>



    @if(session('error'))
       <script>
        alert("{{ session('error') }}");
        </script>
    @endif


    <form action="{{ route('login.post') }}" method="POST" class="form">
        @csrf


        <div class="input-box">
            <label>Email Address</label>
            <input type="email" placeholder="Enter email address" class="form-control @error('email') is-invalid @enderror" name="email" />
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" />
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Submit</button>
        <div class="text">
            <h3>Don't have an account? <a href="{{ route('user.register') }}">Register now</a></h3>
        </div>
    </form>

    {{-- @if ($errors->any())
    <div class="error-message">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
</section>
</body>
</html>
