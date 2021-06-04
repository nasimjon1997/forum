<?php

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
    return redirect('home');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [CommentController::class, 'index'])->name('comments');
Route::get('/answer', [CommentController::class, 'answer'])->name('answer')->middleware('auth');
Route::post('/answer', [CommentController::class, 'answerStore'])->name('answer.store')->middleware('auth');
Route::get('/comments/{id}', [CommentController::class, 'comments'])->name('comments.list');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
