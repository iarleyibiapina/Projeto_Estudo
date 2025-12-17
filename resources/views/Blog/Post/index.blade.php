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
                        <div class="text-muted fst-italic d-flex gap-2" style="font-size: 0.9em;">
                            {{ $comment->created_at->format('d/m/Y H:i') }}
                            @if($comment->user->id == auth()->id())
                                <button type="button"
                                    class="btn btn-sm btn-danger btn-delete"
                                    data-id-post="{{ $post->id_post }}"
                                    data-id-comment="{{ $comment->id_comment }}">
                                    Deletar
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-info"
                                    data-id-post={{ $post->id_post }}
                                    data-id-comment={{ $comment->id_comment }}>
                                    Alterar
                                </button>
                            @endif
                        </div>

                    </div>
                    <div class="text-break" style="line-height: 1.6;">
                        {!! nl2br(e($comment->comment)) !!}
                    </div>
                </div>
            @empty
                <p class="text-center text-muted fst-italic">Nenhum comentário encontrado para este post.</p>
            @endforelse

            @if(auth()->check())
                <div class="text-center">
                    <form action="{{ route('blog.post.postAddComment', $post->id_post) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="comment" class="form-label fw-bold">Deixe um comentário:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar comentário</button>
                    </form>
                </div>
            @else
                <p class="text-center text-muted fst-italic">Você precisa estar <a href="{{ route('blog.auth.loginView') }}">logado</a> para comentar.</p>
            @endif

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

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Seleciona TODOS os botões da página
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(event) {

                const btnText = this.textContent.trim();
                const idPost = this.getAttribute('data-id-post');
                const idComment = this.getAttribute('data-id-comment');

                // Pega o token CSRF do Laravel (necessário para segurança)
                const csrfToken = document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').getAttribute('content') : '';

                // ======================================================
                // 1. LÓGICA DE ALTERAR (A tua lógica original de Textarea)
                // ======================================================
                if (btnText === 'Alterar') {
                    event.preventDefault();

                    // Seleciona a div do comentário
                    const commentDiv = this.closest('.mb-3').querySelector('.text-break');
                    const currentComment = commentDiv.textContent.trim();

                    // Cria o campo de texto (textarea)
                    const textarea = document.createElement('textarea');
                    textarea.className = 'form-control';
                    textarea.rows = 4;
                    textarea.value = currentComment;

                    // Cria o botão de salvar dinamicamente
                    const saveButton = document.createElement('button');
                    saveButton.className = 'btn btn-success mt-2';
                    saveButton.textContent = 'Salvar';

                    // Limpa a div e adiciona a textarea e o botão salvar
                    commentDiv.innerHTML = '';
                    commentDiv.appendChild(textarea);
                    commentDiv.appendChild(saveButton);

                    // --- O Fetch do Salvar ---
                    saveButton.addEventListener('click', function() {
                        const updatedComment = textarea.value;
                        const url = `/api/blog/post/${idPost}/comment/${idComment}`;

                        fetch(url, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                comment: updatedComment
                            })
                        })
                        .then(response => {
                            if (response.ok) {
                                // Sucesso: Volta a mostrar apenas o texto
                                commentDiv.innerHTML = updatedComment;
                                alert('Comentário alterado com sucesso!');
                            } else {
                                alert('Erro ao salvar o comentário.');
                            }
                        })
                        .catch(error => console.error('Erro:', error));
                    });
                }

                // ======================================================
                // 2. LÓGICA DE DELETAR
                // ======================================================
                else if (btnText === 'Deletar') {
                    event.preventDefault();

                    if (confirm('Tem certeza que deseja deletar este comentário?')) {
                        const url = `/api/blog/post/${idPost}/comment/${idComment}`;

                        fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                alert('Comentário deletado com sucesso!');
                                // Remove o elemento visualmente da página
                                this.closest('.mb-3').remove();
                            } else {
                                alert('Erro ao deletar.');
                            }
                        })
                        .catch(error => console.error('Erro:', error));
                    }
                }
            });
        });
    });
</script>
@endsection
