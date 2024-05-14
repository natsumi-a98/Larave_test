<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//index.blade.phpと結びつけるルーティング
Route::get('index', [PostsController::class, 'index'])->withoutMiddleware(['auth']);

//createFormと結びつけるルーティング
Route::get('/create-form', [PostsController::class, 'createForm']);

//新規投稿を作成するためのルーティング(POST)
Route::post('/post/create', [PostsController::class, 'create']);

//更新ページを表示するためのルーティング
Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']);

//更新処理を行うためのルーティング(POST)
Route::post('/post/update', [PostsController::class, 'update']);

//削除処理を行うためのルーティング(GETまたはPOST)
Route::get('/post/delete/{id}', [PostsController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ログアウトしたらログイン画面に移動
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//曖昧検索のルーティング
Route::post('/search', [PostsController::class, 'search'])->name('search');
