<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Symfony\Component\Mime\Encoder\ContentEncoderInterface;

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

Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/news',[NewsController::class, 'index'])->name('news');
Route::get('/article/{news}',[NewsController::class, 'article'])-> name('news.article');
Route::get('/details/{id}',[ContentController::class, 'contentDetail']) ->name('content.details');
Route::get('/category/{categoryId}',[CategoryController::class, 'sortByCategory']) ->name('sort.category');
