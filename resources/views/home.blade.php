@extends('index')

@section('content-login')

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
          <th scope="col">Imagem Filme</th>
          <th scope="col">Categoria</th>
          <th scope="col">Descrição</th>
          <th scope="col" colspan="3">Opções</th>
        </tr>
        {{--  --}}
        @foreach ($filmes as $filme)
        <tr>
    {{-- {{ dd($filme) }} --}}
            <th scope="row">{{ $filme->nomeDoFilme }}</th>
            {{-- {{ dd($filme->imagemFilme) }} --}}
            <td><img src="{{ $filme->imagemFilme }}" width="120" alt="filme imagem"></td>
            <td>{{ $filme->categoriaDoFilme }}</td>
            <td>{{ $filme->descricaoDoFilme }}</td>
            <td class="links-options"><a href="{{ route('filmes.edit', $filme->id) }}">editar</a> / 
              <form action="{{ route("filmes.destroy", $filme->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn ">excluir</button></td>
              </form>
        </tr>
        @endforeach
      </table>
</section>
<hr>
@endsection