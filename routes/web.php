<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;


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


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/articles/create',[ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles/store',[ArticleController::class, 'store'])->name('articles.store');

Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}/update', [ArticleController::class, 'update'])->name('articles.update');

Route::delete('/articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/articles/search', [ArticleController::class, 'search'])->name('articles.search');

Route::get('/', function () {
    return view('welcome');
});
