<?php

use App\Http\Controllers\Shopping;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\App;
use App\Http\Controllers\Dashboard;

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
})->middleware('auth');

Route::get('/dashboard',[Dashboard::class,'Index'])->name('index');
Route::post('/dashboard/createproducts',[Dashboard::class,'CreateProducts'])->name('createproducts');
Route::get('/dashboard/product', [Dashboard::class, 'GetProductNew'])->name('product');
Route::post('/dashboard/getproduct', [Dashboard::class, 'GetProduct'])->name('get-product');
Route::get('/dashboard/del/{id}', [Dashboard::class, 'Del'])->name('del');
Route::get('/dashboard/deldetails/{id}', [Dashboard::class, 'DelDetails'])->name('del-details');
Route::get('/dashboard/edit/{name}', [Dashboard::class, 'EditProducts'])->name('edit');
Route::get('/dashboard/editdetails/{name}', [Dashboard::class, 'EditProductDetails'])->name('edit-details');
Route::post('/dashboard/update', [Dashboard::class, 'UpdateProducts'])->name('update-product');
Route::post('/dashboard/updatedetails', [Dashboard::class, 'UpdateProductDetails'])->name('update-product-details');
Route::post('/dashboard/search', [Dashboard::class, 'Search'])->name('search');
Route::post('/dashboard/searchdetails', [Dashboard::class, 'SearchDetails'])->name('search-details');
Route::get('/test', [Dashboard::class, 'test'])->name('test');
Route::get('/logout', [Dashboard::class, 'logout'])->name('logout');
Route::get('/dashboard/getproductdetails', [Dashboard::class, 'GetProductDetails'])->name('product-details');
Route::post('/dashboard/createproductdetails', [Dashboard::class, 'CreateProductsdetails'])->name('create-product-details');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'shopping'],
     function () {

    Route::get('/showitems', [Shopping::class, 'ShowListItemsPhone'])->name('show-items-phone');
    Route::get('/details/{id}', [Shopping::class, 'ShowDetailsPhone'])->name('show-items-details');
    Route::get('/addtocart/{id}', [Shopping::class, 'Add_to_cart'])->name('Add-to-cart');
    Route::get('/getcafehot', [Shopping::class, 'GetCafeHot']);
    Route::get('/getusersapi', [Shopping::class, 'GetUsersAPI']);
    Route::get('/cart', [Shopping::class, 'Cart']);

});



Route::get('language/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});


