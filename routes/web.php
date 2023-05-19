<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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
    return view('home');
})->name('home');

// Route::get('/posts', function () {
//     return view('posts.index');
// });

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

//Login Routing
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

//Register Routing
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

//Logout Routing
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

//Posts Routing
Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::post('/posts',[PostController::class, 'store']);

Route::post('/posts/edit/{id}',[PostController::class,'Edit' ])->name('posts.edit');

Route::post('/posts/update/{id}',[PostController::class,'Update' ]);
Route::get('/softdelete/posts/{id}',[PostController::class,'SoftDelete' ]);

Route::get('/posts/restore/{id}',[PostController::class,'Restore' ]);

Route::post('/posts/pdelete/{id}',[PostController::class,'PDelete' ])->name('posts.pdelete');

//Likes Routing
Route::post('/posts/{post}/likes',[PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class, 'destroy'])->name('posts.likes');
