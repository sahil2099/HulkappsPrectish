<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::prefix('users')->group(function (){
//    Route::get('{id}/posts/{id}/index',[CommentController::class,'index'])->name('users.posts.comment');
//});
Route::prefix('posts')->group(function (){

    Route::get('/',[postController::class,'index'])->name('posts.index');
    Route::get('/create',[postController::class,'create'])->name('posts.create');
    Route::post('/',[postController::class,'store'])->name('posts.store');

    Route::prefix('{id}')->group(function (){

        Route::get('/show',[postController::class,'show'])->name('posts.show');
        Route::get('/edit',[postController::class,'edit'])->name('posts.edit');
        Route::put('/',[postController::class,'update'])->name('posts.update');
        Route::delete('/',[postController::class,'destroy'])->name('posts.destroy');

        Route::prefix('comments')->group(function () {
            Route::post('/', [CommentController::class, 'store'])->name('posts.comments.store');
            Route::get('/show', [CommentController::class, 'show'])->name('posts.comments.show');
        });
    });
});


