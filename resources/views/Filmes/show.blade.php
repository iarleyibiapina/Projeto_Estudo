<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/form.css') }}">

<style>
    form{
        display: flex; 
        flex-direction:column;
    }

    input, select,  button{
        margin: 1rem 0;
    }

</style>

<div class="nav">
    <h1>Editar Filme</h1>
    <a href="{{ route('logado.index') }}" class="btn">Voltar para home</a>
</div>
<form action="{{ route("filmes.update", $buscaFilme->id) }}" style="padding: 10px" method="POST">
    @csrf
    @method('PUT')
    <label for="nomeFilme">Nome do Filme</label>
    <input type="text" id="nomeDoFilme" name="nomeDoFilme" value="{{ $buscaFilme->nomeDoFilme }}">
    <label for="categoriaFilme">Categoria do Filme</label>
    <select id="categoriaDoFilme" name="categoriaDoFilme" aria-valuenow="{{ $buscaFilme->categoriaDoFilme }}">
        <option value="terror">Terror</option>
        <option value="acao">Ação</option>
        <option value="comedia">Comédia</option>
        <option value="aventura">Aventura</option>
        </select>
    <label for="descricaoFilme">Descrição do filme</label>
    <textarea name="descricaoDoFilme" id="descricaoDoFilme" cols="20" rows="10" placeholder="Descrição.....">{{ $buscaFilme->descricaoDoFilme }}</textarea>
    <button type="submit" class="btn btn-submit">Enviar</button>

    {{-- APLICAR AJAX --}}
</form>

