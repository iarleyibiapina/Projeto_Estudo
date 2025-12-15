<?php

use App\Http\Controllers\Blog\Web\BlogWebLoginController;
use App\Http\Controllers\Blog\Web\WebPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\Web\HomeController as WebHomeController;

Route::prefix("blog")
    ->as("blog.")
    ->group(function () {
    Route::get("/home", [WebHomeController::class, "getHome"])->name("home");
    // parametro para definir a rota por qual parametro na tabela
    // vou buscar se eu passar o model no controller
    // direto, ex: metodo(Post $post)
    Route::
        middleware(["auth"])
        ->get("/post/{slug:slug}", [WebPostController::class, "getPostBySlug"])->name("post.findBySlug");

    Route::controller(BlogWebLoginController::class)
        ->prefix("auth")
        ->as("auth.")
        ->group(function () {
            Route::get("/login", "indexView")->name("loginView");
            Route::post("/login", "login")->name("login");
            Route::get("/logout", "logout")->name("logout");
        });
});
