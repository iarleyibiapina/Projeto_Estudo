@extends('Blog.master')

@section('header-intro')
    <div class="mb-4">
        <h1 class="fw-bold mb-3">{{ $post->title }}</h1>
    </div>
@endsection

@section('main')
        <div class="col-lg-10 col-md-12 justify-content-center">
            <div class="text-muted fst-italic">
                Postado em {{ $post->created_at->format('d/m/Y H:i') }}
                por {{ $post->user->name }}
            </div>


            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5 mb-4" data-mdb-ripple-color="light">
                @if(!empty($post->thumbnail))
                    <img src="{{ asset($post->thumbnail) }}" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;" alt="{{ $post->title }}" />
                @else
                    <img src="https://mdbootstrap.com/img/new/standard/nature/{{ random_int(100,200)}}.jpg" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;" />
                @endif

                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.1);"></div>
                </a>
            </div>

            <section class="mb-5">
                <div class="fs-5 text-break" style="line-height: 1.8;">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </section>

            <hr class="my-4" />

            @forelse ($post->comments as $comment)
                <div class="mb-3 p-3 border rounded-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="fw-bold">{{ $comment->user->name }} comentou:</div>
                        <div class="text-muted fst-italic" style="font-size: 0.9em;">
                            {{ $comment->created_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                    <div class="text-break" style="line-height: 1.6;">
                        {!! nl2br(e($comment->comment)) !!}
                    </div>
                </div>
            @empty
                <p class="text-center text-muted fst-italic">Nenhum comentário encontrado para este post.</p>
            @endforelse

            <div class="d-flex justify-content-between">
                @if(url()->previous() == url()->current())
                        <a href="{{ route('blog.home') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i> Voltar
                        </a>
                    @else
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i> Voltar
                        </a>
                @endif

                {{-- Opcional: Botão de compartilhar ou editar --}}
                {{-- <a href="#" class="btn btn-primary btn-lg">Compartilhar</a> --}}
            </div>

            {{-- lista de comentarios --}}
        </div>
@endsection
