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
    <h1>Criar Filme</h1>
    <a href="{{ route('logado.index') }}" class="btn">Voltar para home</a>
</div>

<form action="{{ route('filmes.store') }}" method="POST" style="padding: 10px;" enctype="multipart/form-data">
    @csrf
    <label for="imagemFilme">Imagem do filme:</label>
    <input type="file" name="imagemFilme" id="imagemFilme">
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
    <button type="submit" class="btn">Enviar</button>
</form>

