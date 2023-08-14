<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inovent | Register</title>
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
            <form action="{{ route('auth.postRegister') }}" method="post" autocomplete="off">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="form-control bg-dark text-light border-0" placeholder="First Name :" required>
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="form-control bg-dark text-light border-0" placeholder="Last Name :" required>
                </div>
                <div class="form-group mb-3">
                    <input type="number" name="phone" value="{{ old('phone') }}"
                        class="form-control bg-dark text-light border-0" placeholder="Phone :" required>
                </div>
                <div class="form-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control bg-dark text-light border-0" placeholder="Email :" required>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" value="{{ old('password') }}" autocomplete="new-password"
                        class="form-control bg-dark text-light border-0" placeholder="Password :" required>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password_confirmation" value="{{ old('email') }}"
                        class="form-control bg-dark text-light border-0" placeholder="Confirm Password :" required>
                </div>
                <input type="submit" value="Continue" class="btn text-light mt-2 bg-info py-1 px-4 border-light">
            </form>
            <div class="w-100 my-3 bg-light" style="height: 2px;"></div>
            <div class="text-light">
                Already have an account ?
                <a href="{{ route('auth.login') }}" class="text-warning text-decoration-none">
                    Sign in
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
            <div class="d-flex align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                    viewBox="0 0 48 48">
                    <path fill="#0288d1" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path>
                    <path fill="#fff"
                        d="M14 19H18V34H14zM15.988 17h-.022C14.772 17 14 16.11 14 14.999 14 13.864 14.796 13 16.011 13c1.217 0 1.966.864 1.989 1.999C18 16.11 17.228 17 15.988 17zM35 24.5c0-3.038-2.462-5.5-5.5-5.5-1.862 0-3.505.928-4.5 2.344V19h-4v15h4v-8c0-1.657 1.343-3 3-3s3 1.343 3 3v8h4C35 34 35 24.921 35 24.5z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                    viewBox="0 0 48 48">
                    <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                    <path fill="#fff"
                        d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                    viewBox="0 0 48 48">
                    <path fill="#03A9F4"
                        d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429">
                    </path>
                </svg>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
