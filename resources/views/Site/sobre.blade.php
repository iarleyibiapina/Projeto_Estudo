{{-- chamando o template --}}
@extends('layouts.app')

@section('title', 'Sobre')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sobre.css') }}">
@endsection

@section('header')
    <hr>

    <h1>Header unica desta pagina</h1>
    <hr>
@endsection

@section('content')
    <hr>
    <h6>Este content esta estilizado pelo css app. que estara em todos blades</h6>

    <p class="sobre">E este paragrafo esta estilizado por meio do css unico definido por este blade</p>

    {{-- vai chamar certas partes para a views e tambem é possivel enviar dados --}}
    {{-- @include('components.propaganda', [
        'data' => 'levando um dado para component',
    ]) --}}

    @include('components.especial')

    {{-- outra forma de utilizar components, por meio do controller, é enviado um dado, e verifica se ele existe --}}

    @if ($propaganda)
        @include('components.propaganda', [
            'data' => 'levando um dado para component',
        ])
    @endif

    {{-- se falso, faz açao dentro de unless --}}
    @unless ($false)
        <p>Faz açao com base no retorno do controller, pode ser usado para caso usuarios nao autenticados</p>
    @endunless

    @empty($dados)
        <p>Dados vazios</p>
    @endempty

    {{-- para autenticacao --}}
    @auth
        logado
    @endauth

    @guest
        usuario padrao ou nao padrao
    @endguest


    {{-- outro exemplo de empty --}}
    @forelse ($dadosParaJson as $dado)
        <p>{{ $dado }}</p>
    @empty
        <p>array vazio</p>
    @endforelse

    {{-- passaando dados de forma dinamica, recupera o dado por meio do construtor --}}
    <x-data :num="$false" />
    <hr>
@endsection

@section('extra')
    <hr>
    {{-- sem append sobrescreve --}}
    {{-- com append, concatena conteudo --}}
    @parent
    <p>Concatenando conteudo</p>
    <p>geralmente usado para adicionar conteudos em navbars</p>
    <hr>
@endsection

@section('footer')
    <hr>
    <p>Footer unico desta pagina</p>
    <hr>
@endsection

@section('js')
    <script>
        var dadosParaFront = @json($dadosParaJson);
        console.log("Escript unico desta pagina");
        console.log(dadosParaFront);
    </script>
@endsection
