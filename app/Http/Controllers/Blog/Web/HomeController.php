<?php

namespace App\Http\Controllers\Blog\Web;

use App\Http\Controllers\Controller;
use App\Services\Blog\PostService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(protected PostService $postService) {
    }

    public function getHome(Request $request)
    {
        $posts = $request->has('search') ?
            $this->postService->searchPosts($request->input('search') ?? 'Null|Invalid') :
            $this->postService->getLastPosts(9);

        return view("Blog.main", [
            "title" => "Home",
            "posts" => $posts
        ]);
    }
}
