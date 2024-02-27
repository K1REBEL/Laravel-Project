<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/dashboard', '/users');
});




Route::get('/users/home', function(){
    return view('users.home');
});


// Route::get('/users/follower', function(){
//     return view('users.follower');
// });


Route::resource('/posts', PostController::class);
Route::resource('/users', UserController::class);

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



Route::get('/users/home', function(){
    return view('users.home');
});


Route::get('/users/followers', function(){
    return view('users.followers');
});



Route::get('/users/following', function(){
    return view('users.following');
});

Route::get('/users/blocked', function(){
    return view('users.blocked');
});

// hello

