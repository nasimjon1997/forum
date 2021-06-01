<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return redirect('comments');
});
Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::get('/comments/{id}', [CommentController::class, 'comments'])->name('comments.list');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/sign-in', [AuthController::class, 'signIn'])->name('auth.sign-in');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
