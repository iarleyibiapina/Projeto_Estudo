<style>
    form{
        display: flex; 
        flex-direction:column;
    }

    input, select,  button{
        margin: 1rem 0;
    }
    .header{
        padding: 2rem;
    }
</style>

<div class="header">

    <h1>Criar Filme</h1>
    <a href="{{ route('logado.index') }}">Voltar para home</a>

</div>

<form action="{{ route('filmes.store') }}" style="">
    @csrf
    <label for="nomeFilme">Nome do Filme</label>
    <input type="text" id="nomeDoFilme" name="nomeDoFilme" value="{{ old('nomeDoFilme') }}">
    <label for="categoriaFilme">Categoria do Filme</label>
    <select id="categoriaDoFilme" name="categoriaDoFilme">
        <option value="terror">Terror</option>
        <option value="acao">Ação</option>
        <option value="comedia">Comédia</option>
        <option value="aventura">Aventura</option>
        </select>
    <label for="descricaoFilme">Descrição do filme</label>
    <textarea name="descricaoDoFilme" id="descricaoDoFilme" cols="20" rows="10" placeholder="Descrição.....">{{ old('descricaoDoFilme') }}</textarea>
    <button type="submit">Enviar</button>
</form>

