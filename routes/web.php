<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\Article;
use App\Http\Controllers\ArticleController;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[App\Http\Controllers\ArticleController::class,'show']);
// Route::get('/home',[App\Http\Controllers\ArticleController::class,'delete']);


Route::get('/delete/{id}',[App\Http\Controllers\ArticleController::class,'delete']);
// Route::get('/home',[App\Http\Controllers\CommentController::class,'comment']);
Route::get('edit/{id}',[App\Http\Controllers\ArticleController::class, 'showData']);
Route::post('edit/',[App\Http\Controllers\ArticleController::class, 'edit']);

Route::post('submit',[App\Http\Controllers\ArticleController::class, 'create']);
Route::get('comment/{id}',[App\Http\Controllers\ArticleController::class, 'showDataForComment']);
Route::post('comment/',[App\Http\Controllers\ArticleController::class, 'addComment']);
