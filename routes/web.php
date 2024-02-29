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
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcomepage.instawelcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->resource('users', UserController::class);

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});


 Route::middleware([
     'auth:sanctum',
     config('jetstream.auth_session'),
     'verified',
 ])->group(function () {
     Route::redirect('/dashboard', '/posts');
 });

Route::middleware('auth')->group(function (){
//    Route::resource('users',UserController::class);
//    Route::resource('posts',PostController::class);
    storage::disk('public');
});

Route::resource('users',UserController::class);
Route::resource('posts',PostController::class);

Route::get('/users/search', [UserController::class,'search'])->name('users.search');
Route::post('/posts/{post}/comment',[PostController::class , 'comments'])->name('posts.comment');

Route::get('/users/home', function(){
    return view('users.home');
});
Route::get('/posts/{id}', [PostController::class, 'show']);


// Route::get('/users/follower', function(){
//     return view('users.follower');
// });


//Route::resource('/posts', PostController::class);
//Route::resource('/users', UserController::class);

Route::post('posts/{post}/like',[PostController::class,'like'] )->name('posts.like');
Route::delete('posts/{post}/unlike',[PostController::class,'unlike'] )->name('posts.unlike');


Route::post('users/{user}/follow',[UserController::class,'follow'])->name('users.follow');
Route::post('users/{user}/unfollow',[UserController::class,'unfollow'])->name('users.unfollow');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});



Route::get('/user/home-page', function(){
    return view('user.home-page');
});


Route::get('/user/followers', function(){
    return view('user.followers');
});



Route::get('/user/following', function(){
    return view('user.following');
});

Route::post('/users/{user}/block', [UserController::class, 'block'])->name('users.block');
Route::post('/users/{user}/unblock', [UserController::class, 'unblock'])->name('users.unblock');



// hello

Route::get('/profile', function () {
    return view('userProfile.myprofile');
});

Route::get('/edit', function () {
    return view('userProfile.edit');
});

Route::get('/profile/user', function () {
    return view('userProfile.otherprofile');
});

Route::get('/create', function () {
    return view('userProfile.createpost');
});
