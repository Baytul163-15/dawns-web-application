<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', 'App\Http\Controllers\UserController@register');
Route::post('/login', 'App\Http\Controllers\UserController@login');
Route::get('/user', 'App\Http\Controllers\UserController@getCurrentUser');
Route::post('/update', 'App\Http\Controllers\UserController@update');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');
Route::get('/getrecent/', 'App\Http\Controllers\ArticlesController@getRecent');




//get type_ie=3 articles where are welcome info
Route::get('/welcomeinfo/', 'App\Http\Controllers\ArticlesController@welcomeInfo');
Route::get('/welcomeinfo123/', 'App\Http\Controllers\ArticlesController@welcomeInfo123');
Route::get('/getproducts/', 'ApiController@getProducts'); // get product
Route::get('/getbrands/', 'ApiController@getBrands'); // get brand
Route::get('/getcategories/', 'ApiController@getCategories'); //get category
Route::get('/getmenu/', 'ApiController@getMenu'); //get Menu
Route::get('/getcoupon/', 'ApiController@getCoupon'); 
Route::get('/getdistrict/', 'ApiController@getDistrict'); 
Route::get('/getdivision/', 'ApiController@getDivision'); 
Route::get('/getorder/', 'ApiController@getOrder'); 
Route::get('/getorder-details/', 'ApiController@getOrderDetails'); 
Route::get('/get_brand_details/{id}', 'ApiController@getBrandDetails'); // get brand details 8 9 10

//get menu products
Route::get('/sub-categories/products/{id}', 'App\Http\Controllers\ApiController@SubCatProducts');

Route::post('/register', 'ApiController@Register');
Route::post('/coupon', 'ApiController@Coupon'); 
