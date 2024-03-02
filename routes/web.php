<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Features;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcomepage.instawelcome');
});

 Route::middleware([
     'auth:sanctum',
     config('jetstream.auth_session'),
     'verified',
 ])->group(function () {
     Route::redirect('/dashboard', '/posts');
 });

Route::middleware('auth')->group(function (){
    storage::disk('public');
});

Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);

// Route::get('/posts/{id}', [PostController::class, 'show']);

Route::post('posts/{post}/like',[PostController::class, 'like'] )->name('posts.like');
Route::delete('posts/{post}/unlike',[PostController::class, 'unlike'] )->name('posts.unlike');

Route::post('/posts/{post}/comment',[PostController::class , 'comments'])->name('posts.comment');
Route::post('/comments/{post}/{comment}/like',[PostController::class, 'like_comment'] )->name('comments.like');
Route::delete('/comments/{comment}/unlike',[PostController::class, 'unlike_comment'] )->name('comments.unlike');

Route::post('users/{user}/follow',[UserController::class, 'follow'])->name('users.follow');
Route::post('users/{user}/unfollow',[UserController::class, 'unfollow'])->name('users.unfollow');

Route::get('/users/{id}/social', [UserController::class, 'social'])->name('users.social'); //For Alaa, Use this route to access the page you're developing

Route::post('/users/{user}/block', [UserController::class, 'block'])->name('users.block');
Route::post('/users/{user}/unblock', [UserController::class, 'unblock'])->name('users.unblock');

Route::get('/retreive', [PostController::class, 'retreiveSavedposts'])->name('posts.retreive');
Route::post('/posts/{post}/save', [PostController::class, 'savepost'])->name('posts.save');
Route::delete('/posts/{post}/unsave', [PostController::class, 'unsavepost'])->name('posts.unsave');

Route::get('/posts/tags/{tag}', [PostController::class, 'get_tag'])->name('posts.tag');

Route::get("/search",[UserController::class, 'search']);
