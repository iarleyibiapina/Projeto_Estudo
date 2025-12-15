<?php

namespace App\Services\Blog;

use App\Models\Blog\Post;
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

    public function getPosts(int $limit = 10): LengthAwarePaginator
    {
        return Post::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate();
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

    public function searchPosts(string $term): Collection
    {
        return Post::with('user')
            ->where('title', 'LIKE', "%{$term}%")
            ->withCount('comments')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
