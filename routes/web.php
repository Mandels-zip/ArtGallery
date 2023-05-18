<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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

Route::get('/login')->middleware('role');

//FOR EVERYONE
Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/news',[NewsController::class, 'index'])->name('news');
Route::get('/details/{id}',[ContentController::class, 'contentDetail']) ->name('content.details') -> middleware('check.explicit');
Route::get('/category/{categoryId}',[CategoryController::class, 'sortByCategory']) ->name('sort.category');
Route::get('/article/{news}',[NewsController::class, 'article'])-> name('news.article');
Route::get('/user/{nickname}', [UserController::class, 'personalPage']) -> name('user.page');

//FOR GUESTS ONLY
Route::middleware(['guest'])->group(function () {
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'authenticate']) -> name('login');
});

// FOR ONLY AUTH USERS
Route::group(['middleware' => ['auth', 'role:admin,moderator,user']], function () {
Route::post('/logout', [AuthController::class, 'logout']) -> name('logout');
Route::post('/like/{contentId}', [LikeController::class, 'toggleLike' ])->name('like.toggle'); 
Route::post('/comment/{contentId}', [CommentController::class, 'create']) ->name('comment.create');
Route::delete('/comment/{commentId}', [CommentController::class, 'destroy']) -> name('comment.destroy');
Route::put('/update/user', [UserController::class, 'updateProfile']) ->name('update.user');
Route::post('/create/content', [ContentController::class, 'store']) ->name('store.content');
Route::delete('/content/delete/{contentId}', [ContentController::class, 'destroy']) ->name('destroy.content');
Route::delete('/delete/user/{id}', [UserController::class,'destroy']) -> name('destroy.user');
Route::get('user/settings/{nickname}', [UserController::class, 'settings']) -> name('user.settings')->middleware('checkId');

});

//FOR ADMIN/MODERATORS ONLY
Route::group(['middleware' => ['auth', 'role:admin,moderator']], function () {
    //Create news
    Route::get('/news/create', function () {
        return view('pages.newspage.createnews');})->name('news.create');
    Route::post('/news', [NewsController::class, 'store']) ->name('news.store');

    //edit news
    Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/edit/{news}', [NewsController::class, 'update']) ->name('news.update');

    //delete news
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});

//FOR ADMIN ONLY
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/create', [CategoryController::class, 'create'])-> name('category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']) ->name('category.destroy');
});


Route::get('/post', function () {
    return view('pages.postpage.post');
})->name('post');

Route::get('/post_edit', function () {
    return view('pages.postpage.postedit');
})->name('postedit');

Route::get('/auhor_name', function () {
    return view('pages.authorpage.author');
})->name('author');

Route::get('/auhor_edit', function () {
    return view('pages.authorpage.author_edit');
})->name('author_edit');

Route::get('/main', function () {
    return view('pages.mainpage.main');
})->name('main');

Route::get('/maincategory', function () {
    return view('pages.mainpage.maincategory');
})->name('maincategory');
