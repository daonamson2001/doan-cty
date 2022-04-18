<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [LoginController::class, 'login'])->middleware([LoginMiddleware::class])->name('login');
Route::post('/check-login', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::prefix('dang-ky')->group(function () {
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('check-register', [LoginController::class, 'checkRegister'])->name('checkRegister');
Route::get('active-account', function () {
    return view('mail.active_account');
})->name('active_account');
Route::get('actived', [LoginController::class, 'actived'])->name('actived');

Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);
    Route::put('users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('users/hidden/{id}', [UserController::class, 'hidden'])->name('users.hidden');
    Route::resource('comments', CommentController::class);
});