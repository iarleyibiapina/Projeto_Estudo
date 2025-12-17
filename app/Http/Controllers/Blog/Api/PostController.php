<?php

namespace App\Http\Controllers\Blog\Api;

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

            return response()->json([
                'message' => 'Post criado com sucesso!',
                'post' => $post,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ], 500);
        }
    }
    // atualizar
    // deletar'

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
            return response()->json([
                'message' => 'Comentário adicionado com sucesso!',
            ], 201);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function deleteRemovecomment(int $idPost, int $idComment)
    {
        try {
            $this->postService->deleteComment(idPost: $idPost, idComment: $idComment);
            return response()->json([
                'message' => 'Comentário removido com sucesso!',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ], 500);
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
            return response()->json([
                'message' => 'Comentário atualizado com sucesso!',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
