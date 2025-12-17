<?php

namespace App\Http\Controllers\Blog\Web;

use Illuminate\Http\Request;
use App\Services\Blog\PostService;
use App\Http\Controllers\Controller;

class WebPostController extends Controller
{
    public function __construct(protected PostService $postService) {
    }

    public function getPostBySlugView(string $slug)
    {
        $post = $this->postService->findPostBySlug($slug);

        return view("Blog.Post.index", [
            "title" => $post->title,
            "post" => $post
        ]);
    }

    public function getAllPostsView()
    {
        $posts = $this->postService->getPosts();

        return view("Blog.Post.all", [
            "title" => "Todos os posts",
            "posts" => $posts
        ]);
    }

    public function getCreatePostView()
    {
        return view("Blog.Post.create", [
            "title" => "Create New Post"
        ]);
    }

    public function getMyCreatedPostsView()
    {
        $posts = $this->postService->getPosts(auth()->id());

        return view("Blog.Post.my", [
            "title" => "Meus posts criados",
            "posts"=> $posts
        ]);
    }
}
