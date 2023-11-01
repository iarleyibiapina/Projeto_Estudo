<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <style>
        .false-alert{
            display: none;
        }
    </style>
</head>
<body>
    <h1>Index</h1>
    <hr>
    <br>
    <div class="">
        @if (auth()->check())
            <div class="">
                <h2>Olá {{ Auth::user()->name }}</h2>
                Você está logado.
                <a href="{{ route("login.destroy") }}">Logout</a>
                <hr>
            </div>
            @else
            <div class="">
                <a href="{{ route("login.index") }}">Login</a>
            </div>
        @endif
        <br>
        @yield('content')
    </div>
</body>
</html>