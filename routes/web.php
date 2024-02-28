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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



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