<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Br - @yield('title')</title>
    @yield('css')
    {{-- este css estara em todas blades --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @yield('header')
    @yield('content')
    @section('extra')
        <p>Este Conteudo extra, poderá ter 'filhos' por meio de um append nos templates filhos</p>
        <p>Sem &commat;append o conteudo sera sobrescrito, com append, sera adicionado</p>
    @show
    {{-- se nao achar conteudo gere UMA NOVA view --}}
    {{-- @yield('add', View::make('layouts.notFound')) --}}
    @yield('footer')
    @yield('js')
    @stack('js_especial')
    {{-- este js estara em todas blades --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
