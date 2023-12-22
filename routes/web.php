<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserArticleController;

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
Route::get('/', HomeController::class)->name('home');
Route::get('/article_detail/{id}', [HomeController::class, 'detail'])->name('article_detail');
Route::view('/about', 'about')->name('about');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/articles/list', [ArticleController::class, 'index'])->name('article.index');
    // Route::get('/articles/add', [ArticleController::class, 'create'])->name('article.create');
    // Route::post('/articles/save', [ArticleController::class, 'store'])->name('article.store');
    // Route::get('/articles/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    // Route::put('/articles/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    // Route::delete('/articles/delete/{id}',[ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/users/{user}/article',UserArticleController::class)->name('users.user.article');

    Route::resource('articles', ArticleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
