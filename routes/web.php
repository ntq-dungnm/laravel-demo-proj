<?php

use App\Http\Controllers\client\signInController;
use App\Http\Controllers\client\signUpController;
use App\Http\Controllers\client\homePageController;
use App\Http\Controllers\client\productDetailsController;
use App\Http\Controllers\client\shoppingCartController;
use App\Http\Controllers\client\checkOutController;
use App\Http\Controllers\admin\productHandleController;
use App\Http\Controllers\admin\addProductController;
use App\Http\Controllers\admin\orderHandleController;
use App\Http\Controllers\admin\orderDetailsController;


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

Route::get('sign-in', [signInController::class, 'getsignIn'])->name('sign.in');
Route::post('sign-in', [signInController::class, 'postSignIn']);

Route::get('sign-up', [signUpController::class, 'getSignUp']);
Route::post('sign-up', [signUpController::class, 'postSignUp']);

Route::get('home-page', [homePageController::class, 'getHomePage'])->name('home-page');

Route::get('product-details', [productDetailsController::class, 'getProductDetails']);

Route::post('chooseColor', [productDetailsController::class, 'chooseColor']);

Route::get('shopping-cart', [shoppingCartController::class, 'getShoppingCart']);

Route::get('check-out', [checkOutController::class, 'getCheckOut'])->name('check-out');

Route::get('product-handle', [productHandleController::class, 'getProductHandle']);

Route::get('add-product', [addProductController::class, 'getAddProduct']);

Route::get('order-handle', [orderHandleController::class, 'getOrderHandle']);

Route::get('order-details', [orderDetailsController::class, 'getOrderDetails']);

Route::post('update-product', [shoppingCartController::class, 'handleProduct']);
