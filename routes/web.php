<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/details/{id}',[ContentController::class, 'contentDetail']) ->name('content.details');
Route::get('/category/{categoryId}',[CategoryController::class, 'sortByCategory']) ->name('sort.category');
Route::post('/login', [AuthController::class, 'authenticate']) -> name('login');
Route::post('/logout', [AuthController::class, 'logout']) -> name('logout');
Route::get('/article/{news}',[NewsController::class, 'article'])-> name('news.article');
Route::post('/register', [UserController::class, 'register'])->name('register');


Route::get('/login')->middleware('role');

Route::group(['middleware' => ['auth', 'role:admin,moderator']], function () {

    Route::get('/news/create', function () {
        return view('pages.newspage.createnews');
    })->name('news.create');
    
    Route::post('/news', [NewsController::class, 'store']) ->name('news.store');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    
});
