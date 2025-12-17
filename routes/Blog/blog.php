<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\Web\WebPostController;
use App\Http\Controllers\Blog\Web\BlogWebLoginController;
use App\Http\Controllers\Blog\Web\HomeController as WebHomeController;
use App\Http\Controllers\Blog\Script\PostController as ScriptPostController;

Route::prefix("blog")
    ->as("blog.")
    ->group(function () {
    Route::get("/home", [WebHomeController::class, "getHome"])->name("home");

    Route::controller(WebPostController::class)
        ->middleware(["auth"])
        ->prefix("post")
        ->as("post.")
        ->group(function () {
            Route::get("/", "getCreatePostView")->name("getCreatePostView");
            Route::get("/my", "getMyCreatedPostsView")->name("getMyCreatedPostsView");
            Route::get("/all", "getAllPostsView")->name("getAllPostsView");

            Route::controller(ScriptPostController::class)->group(function () {
                Route::post("/store", "postStore")->name("postStore");
                // comentarios
                Route::post("/{id_post}/comment", "postAddComment")->name("postAddComment");
                Route::delete("/{id_post}/comment/{id_comment}", "deleteRemovecomment")->name("deleteRemovecomment");
                // Route::put("/{id_post}/comment/{id_comment}", "putComment")->name("putComment");
            });
            //
            // parametro para definir a rota por qual parametro na tabela
            // vou buscar se eu passar o model no controller
            // direto, ex: metodo(Post $post)
            Route::get("/{slug:slug}", "getPostBySlugView")->name("findBySlug");
        });

    Route::controller(BlogWebLoginController::class)
        ->prefix("auth")
        ->as("auth.")
        ->group(function () {
            Route::get("/login", "indexView")->name("loginView");
            Route::post("/login", "login")->name("login");
            Route::get("/logout", "logout")->name("logout");
        });
});
