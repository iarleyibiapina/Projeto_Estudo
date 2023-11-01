@extends('index')

@section('content')
<style>

    td,
th {
  border: 1px solid rgb(190, 190, 190);
  padding: 10px;
}

td {
  text-align: center;
}

tr:nth-child(even) {
  background-color: #eee;
}

th[scope='col'] {
  background-color: #696969;
  color: #fff;
}

th[scope='row'] {
  background-color: #d7d9f2;
}

caption {
  padding: 10px;
  caption-side: bottom;
}

table {
  border-collapse: collapse;
  border: 2px solid rgb(200, 200, 200);
  letter-spacing: 1px;
  font-family: sans-serif;
  font-size: 0.8rem;
  margin: 1rem 0;
}

th > a{
    color: #fff;
}
</style>
<hr>
<section class="conteudo">

    <table class="nav-table">
        <tr>
            <th scope="col"><a href="{{ route("filmes.index") }}">Criar Filme</a></th>
        </tr>
    </table>

    <table class="content-table">
        <thead>
            Filmes: 
        <thead>

        <tr>
          <th scope="col">Nome Filme</th>
          <th scope="col">Categoria</th>
          <th scope="col">Descrição</th>
          <th scope="col">Opções</th>
        </tr>
        {{--  --}}
        @foreach ($filmes as $filme)
        <tr>
    {{-- {{ dd($filme) }} --}}
            <th scope="row">{{ $filme->nomeDoFilme }}</th>
            <td>{{ $filme->categoriaDoFilme }}</td>
            <td>{{ $filme->descricaoDoFilme }}</td>
            <td><a href="{{ route('filmes.show', $filme->id) }}">editar</a> / <a href="">excluir</a></td>
        </tr>
        @endforeach
        <tr>
          <th scope="row">Nome </th>
          <td>categoria x</td>
          <td>descricao x</td>
          {{-- editar, redireciona --}}
          <td><a href="">editar</a> / 
            {{-- criar formulario --}}
            <a href="">excluir</a></td>
        </tr>

      </table>
</section>
<hr>
@endsection