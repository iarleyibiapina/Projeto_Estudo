@extends('Blog.master')

@section('header-intro')
    <div class="mb-4">
        <h1 class="fw-bold mb-3">Criar um post</h1>
    </div>
@endsection

@section('main')
    <div class="col-lg-6 col-md-8 mx-auto">
        <form method="POST" action="{{ route('blog.post.postStore') }}">
            @csrf

            <div class="mb-4">
                <p class="text-danger">{{ $errors->first('title') }}</p>
                <label for="title" class="form-label">Titulo post</label>
                <input type="title" class="form-control" id="title" name="title" required value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <p class="text-danger">{{ $errors->first('content') }}</p>
                <label for="content" class="form-label">Conteudo</label>
                <input type="content" class="form-control" id="content" name="content" required>
            </div>

            {{-- thumb --}}
            {{-- <div class="mb-4">
                <p class="text-danger">{{ $errors->first('thumbnail') }}</p>
                <label for="thumbnail" class="form-label">Conteudo</label>
                <input type="thumbnail" class="form-control" id="thumbnail" name="thumbnail" required>
            </div> --}}

            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
@endsection
