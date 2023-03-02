<?php

use App\Http\Controllers\signInController;
use App\Http\Controllers\signUpController;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\productDetailsController;


use Illuminate\Support\Facades\Route;

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

Route::get('sign-in',[signInController::class,'getsignIn'])->name('sign.in');
Route::post('sign-in',[signInController::class,'postSignIn']);

Route::get('sign-up',[signUpController::class,'getSignUp']);
Route::post('sign-up',[signUpController::class,'postSignUp']);

Route::get('home-page',[homePageController::class,'getHomePage'])->name('home-page');

Route::get('product-details',[productDetailsController::class,'getProductDetails']);

Route::post('chooseColor',[productDetailsController::class,'chooseColor']);


