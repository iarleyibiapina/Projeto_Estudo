<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal do _____</title>
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/form.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="nav">
        <h1>Barra de navegação</h1>
    </div>
        @if (auth()->check())
        <div class="">
            <h2>Olá {{ Auth::user()->name }}</h2>
            Você está logado.
            <a href="{{ route("login.destroy") }}" class="btn">Logout</a>
        </div>
        @else
        <div class="">
            <a href="{{ route("login.index") }}" class="btn">Login</a>
            <a href="#" class="btn">Registrar</a>
        </div>
        @endif

        @if (!auth()->check())
            @yield('content')
            @yield('login')
        @else
            @yield('content-login')
        @endif

</body>
</html>