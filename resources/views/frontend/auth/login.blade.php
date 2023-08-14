<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inovent | Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .auth {
            background: url("{{ asset('images/auth_bg.png') }}") center center/cover;
        }
    </style>
</head>

<body>
    <div class="auth w-100 vh-100">
        <img src="{{ asset('images/auth_logo.png') }}" class="p-4 d-md-inline d-none" alt="">
        <div class="register float-end w-75 vh-100 p-4">
            <h2>Set up your account</h2>
            <p class="text-white ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum
                has been the industry.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('auth.postLogin') }}" method="post" autocomplete="off">
                @csrf
                <div class="form-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control bg-dark text-light border-0" placeholder="Email :" required>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" value="{{ old('password') }}" autocomplete="new-password"
                        class="form-control bg-dark text-light border-0" placeholder="Password :" required>
                </div>
                <input type="submit" value="Continue" class="btn text-light mt-2 bg-info py-1 px-4 border-light">
            </form>
            <div class="w-100 my-3 bg-light" style="height: 2px;"></div>
            <div class="text-light">
                Create an account ?
                <a href="{{ route('auth.register') }}" class="text-warning text-decoration-none">
                    Sign up
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
