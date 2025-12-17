<?php

use App\Http\Controllers\Blog\Api\PostController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::
    middleware('auth.session')
    ->prefix('blog')
    ->as('blog.api.')
    ->group(function () {

    Route::controller(PostController::class)
        ->prefix('post')
        ->as('post.')
        ->group(function () {
            Route::post('/store', 'postStore')->name('store');
            // Comentários
            Route::post('/{id_post}/comment', 'postAddComment')->name('addComment');
            Route::delete('/{id_post}/comment/{id_comment}', 'deleteRemovecomment')->name('removeComment');
            Route::put('/{id_post}/comment/{id_comment}', 'putComment')->name('updateComment');
        });
});
