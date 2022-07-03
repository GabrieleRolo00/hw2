<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PreferitiController;
use App\Http\Controllers\MappaController;
use App\Http\Controllers\CreateController;

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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});


#LOGIN
Route::get('/login', function () {
    return view('login');
});
Route::post('/login',[UserController::class,'login']);

#REGISTER
Route::get('/register', [UserController::class,'index'])->name('register');
Route::get('register/email/{email}',[UserController::class,'checkEmail']);
Route::post('register',[UserController::class,'register']);

#INDEX
Route::get('index/carica/{tipo}',[IndexController::class,'carica']);


#CREATE
Route::get('create',function(){
    return view('create');
});
Route::get('create/crea',[CreateController::class,'create']);

#LOGOUT

Route::get('/logout',[UserController::class,'logout']);

#SEARCH

Route::get('/search',[SearchController::class,'search']);
Route::get('/search2/{citta}',[SearchController::class,'search2']);

#POST
Route::get('/post/{id}',[PostController::class,'post']);

#LIKE
Route::get('/like/addLike/{id}',[LikeController::class,'addLike']);
Route::get('/like/removeLike/{id}',[LikeController::class,'removeLike']);
Route::get('/post/like/addLike/{id}',[LikeController::class,'addLike']);
Route::get('/post/like/removeLike/{id}',[LikeController::class,'removeLike']);

#PREFERITI
Route::get('/preferiti', function(){
    return view('preferiti');
});

Route::get('/preferiti/caricaPref',[PreferitiController::class,'caricaPref']);

#MAPPA

Route::get('/mappa/{full_address}',[MappaController::class,'mappa']);
Route::get('post/mappa/{full_address}',[MappaController::class,'mappa']);

