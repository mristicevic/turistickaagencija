<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopCartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

route::get('/',[HomeController::class,'index']);
route::get('/redirect',[HomeController::class,'redirect']);
route::get('/home',[HomeController::class,'redirect']);
route::get('/search',[HomeController::class,'search']);


route::get('/view_catagory',[AdminController::class,'view_catagory']);
route::post('/add_category',[AdminController::class,'add_category']);
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
route::get('/view_trip',[AdminController::class,'view_trip']);
route::post('/add_trip',[AdminController::class,'add_trip']);
route::get('/show_trips',[AdminController::class,'show_trips']);
route::get('/delete_trip/{id}',[AdminController::class,'delete_trip']);
route::get('/update_trip/{id}',[AdminController::class,'update_trip']);
route::post('/update_trip_confirm/{id}',[AdminController::class,'update_trip_confirm']);
route::get('/view_orders',[AdminController::class,'view_orders']);

route::get('/all_trips',[HomeController::class,'all_trips']);
route::post('/shopcart',[ShopCartController::class,'store']);
route::get('/checkout',[ShopCartController::class,'index']);
route::get('/checkout/get/items',[ShopCartController::class,'getCartItemForCheckout']);
Route::post('/process/user/payment', [ShopCartController::class, 'processPayment']);



