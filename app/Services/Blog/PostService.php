<?php

namespace App\Services\Blog;

use App\DTO\Blog\CommentDTO;
use App\DTO\Blog\PostDTO;
use App\Models\Blog\Comment;
use App\Models\Blog\Post;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
{
    public function getLastPosts(int $limit = 10): Collection
    {
        return Post::with('user')
            ->orderBy('created_at', 'desc')
            ->withCount('comments')
            ->take($limit)
            ->get();
    }

    public function getPostsCount(): int
    {
        return Post::count();
    }

    public function getPosts(
        int $userId  = null,
        int $perPage = 15,
        // int $page    = null,
    ): LengthAwarePaginator
    {
        $query = Post::with('user')
            ->orderBy('created_at', 'desc');

        if ($userId) {
            $query->where('user_id', $userId);
        }

        return $query->paginate(perPage: $perPage);
    }

    public function findPostBySlug(string $slug, array $with = ['user', 'comments']): Post
    {
        return Post::with($with)
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function findPostById(int $id, array $with = ['user', 'comments']): Post
    {
        return Post::with($with)
            ->where('id_post', $id)
            ->firstOrFail();
    }

    public function searchPosts(string $term): LengthAwarePaginator
    {
        return Post::with('user')
            ->where('title', 'LIKE', "%{$term}%")
            ->withCount('comments')
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    // "user_id",
    // "title",
    // "slug",
    // "thumbnail",
    // "content",

    /**
     *
     * @param array{
     *  title: string,
     *  content: string,
     *  thumbnail: \File
     * } $data
     * @return Post|Exception
     */
    public function create(array $data)
    {
        try {
            // salva arquivo de thumbnail
                // supondo que estou usando um servico de armazenamento local
            $thumb = "public/images/post/arquivo.jpg";
            // insere no DTO
            $post = new PostDTO(
                user_id: auth()->id(),
                title: $data['title'],
                thumbnail: $thumb,
                content: $data['content'],
            );
            // cria o post
            return Post::create($post->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // atualizar
    // deletar

    // adicionar comentario(s) ao post

    /**
     *
     * @param array{
     *  user_id: int,
     *  post_id: int,
     *  comment: string
     * } $data
     * @param int $idPost
     * @return Comment|Exception
     */
    public function addComment(array $data): Comment
    {
        try {
            return Comment::create(
                (new CommentDTO(
                    $data['user_id'],
                    post_id: $data['post_id'],
                    comment: $data['comment']
                ))->all()
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     *
     * @param int $idPost
     * @param int $idComment
     * @return void|Exception
     */
    public function deleteComment(int $idPost, int $idComment): void
    {
        try {
            $comment = Comment::where('id_comment', $idComment)
                ->where('post_id', $idPost)
                ->firstOrFail();

            $comment->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    // remover um comentario de um post

    /**
     * @param int $idPost
     * @param int $idComment
     * @param string $comment
     * @return void|Exception
     */
    public function updateComment(int $idPost, int $idComment, string $comment): void
    {
        try {
            $commentModel = Comment::where('id_comment', $idComment)
                ->where('post_id', $idPost)
                ->firstOrFail();

            $commentModel->comment = $comment;
            $commentModel->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
