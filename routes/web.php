<?php

use App\Models\Article;
use App\Http\Middleware\CheckAge;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckOwnership;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;

Route::get('biagio995.github.io/bogarticoli/', [HomeController::class, 'index'])->name('home');
Route::get('/chi-siamo', [HomeController::class, 'aboutUs'])->name('chi-siamo');
Route::get('/contatti', [HomeController::class, 'contacts'])->name('contatti');




// Routes for creating and storing articles
Route::middleware(['auth', CheckAge::class])->group(function () {
    Route::resource('/articles', ArticleController::class)->except(['index', 'show', 'update', 'destroy']);
    Route::get('/dashboard', [ArticleController::class, 'dashboard'])->name('dashboard');
});

Route::resource('/articles', ArticleController::class)->only(['index', 'show']);
Route::delete('/articles/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::put('/articles/update', [ArticleController::class, 'update'])->name('articles.update');

Route::middleware([CheckOwnership::class])->group(function () {

    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}/update', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('/contatti', [HomeController::class, 'contacts'])->name('contatti');
Route::post('/contatti', [ContactController::class, 'sendContactEmail'])->name('email.send');