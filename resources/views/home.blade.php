@extends('index')

@section('content')
<h2>Home logado</h2>
<p>painel de logado</p>
<a href="{{ route('login.destroy') }}">Sair</a>

@endsection