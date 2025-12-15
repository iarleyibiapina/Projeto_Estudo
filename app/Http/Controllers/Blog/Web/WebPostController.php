<?php

namespace App\Http\Controllers\Blog\Web;

use App\Http\Controllers\Controller;
use App\Services\Blog\PostService;
use Illuminate\Http\Client\Request;

class WebPostController extends Controller
{
    public function __construct(protected PostService $postService) {
    }

    public function getPostBySlug(string $slug)
    {
        $post = $this->postService->findPostBySlug($slug);

        return view("Blog.Post.index", [
            "title" => $post->title,
            "post" => $post
        ]);
    }
}
