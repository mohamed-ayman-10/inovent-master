<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Inovent</title>
</head>

<body>

    <div class="container pt-5">

        {{-- Logo --}}
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>

        <p>Hi there,</p>
        <p>You have received a new order for the event <b class="fs-5">{{ $event_name }}</b> . </p>

        <h4 class="fw-bold pt-3 pb-2">Order Summary</h4>

        <p class="mb-0">Order Reference : <b>{{ $reference }}</b></p>
        <p class="mb-0">Order Name : <b>{{ $name }}</b></p>
        <p class="mb-0">Order Date : <b>{{ $date }}</b></p>
        <p class="mb-0">Order Email : <b>{{ $email }}</b></p>

    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
