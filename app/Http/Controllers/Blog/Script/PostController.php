<?php

namespace App\Http\Controllers\Blog\Script;

use App\Http\Controllers\Controller;
use App\Services\Blog\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(protected PostService $postService) {
    }
    public function postStore(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'content' => ['required', 'string'],
                // 'thumbnail' => ['nullable', 'image', 'max:2048'],
            ]);
            $post = $this->postService->create($request->all());

            return redirect()->route('blog.post.findBySlug',
            ['slug' => $post->slug]
            );
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
    // atualizar
    // deletar

    // adicionar comentario(s) ao post
    public function postAddComment(Request $request, int $idPost)
    {
        try {
            $request->validate([
                'comment' => ['required', 'string'],
            ]);
            $this->postService->addComment(
                [
                    'post_id'=> $idPost,
                    'user_id'=> auth()->id(),
                    'comment'=> $request->input('comment'),
                ]
            );
            return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
    // remover um comentario de um post
    public function deleteRemovecomment(int $idPost, int $idComment)
    {
        try {
            if(!$this->postService->deleteComment(idPost: $idPost, idComment: $idComment)) {
                throw new \Exception("Erro ao remover o comentário.");
            }
            return redirect()->back()->with('success', 'Comentário removido com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function putComment(Request $request, int $idPost, int $idComment)
    {
        try {
            $request->validate([
                'comment' => ['required', 'string'],
            ]);
            $this->postService->updateComment(
                idPost: $idPost,
                idComment: $idComment,
                comment: $request->input('comment')
            );
            return redirect()->back()->with('success', 'Comentário atualizado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
}
