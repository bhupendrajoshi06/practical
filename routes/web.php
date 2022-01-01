<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

Route::get('signup', function () {
    return view('signup');
});

Route::get('login', function () {
    return view('login');
});


Route::POST("signup_user",[MainController::class,'signup']);



Route::POST("login_user",[MainController::class,'login']);




Route::match(['get','post'],"/",[MainController::class,'home']);
Route::group(['middleware'=>['user']],function(){

    

Route::match(['get','post'],"blogs",[MainController::class,'index']);

Route::match(['get','post'],"create_blog",[MainController::class,'create']);

Route::match(['get','post'],"deleteblog/{id}",[MainController::class,'destroy']);

Route::match(['get','post'],"editblog/{id}",[MainController::class,'show']);

Route::match(['get','post'],"update/{id}",[MainController::class,'update']);

});
Route::match(['get','post'],"logout",[MainController::class,'logout']);




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
