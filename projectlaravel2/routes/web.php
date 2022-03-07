<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\commentcontroller;

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


Route::get('User',[userController::class,'index']);
Route::get('User/Edit/{id}',[userController::class,'edit']);
Route::post('User/Update',[userController::class,'update']);
Route::get('User/Destroy/{id}',[userController::class,'destroy']);
Route::get('LogOut',[userController::class,'logOut']);


// });

Route::resource('Blog',blogController::class);


##########################################################
Route::get('User/Create',[userController::class,'create']);
Route::post('User/Register',[userController::class,'store']);

Route::get('Login',[userController::class,'login']);
Route::post('DoLogin',[userController::class,'doLogin']);
##########################################################
Route::get('AdminLogin',[adminController::class,'login']);
Route::post('AdminDoLogin',[adminController::class,'doLogin']);
Route::get('AdminLogOut',[adminController::class,'logOut']);
#########################################################

//Route::get('comment',[CommentController::class,'index']);
//Route::get('comment/Create',[CommentController::class,'create']);
//Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
Route::resource('Comment', CommentController::class);
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.index');
