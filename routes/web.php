<?php

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

Auth::routes();

Route::get('/login', function () {
    return redirect()->to('/');
    })->name('login');
    
    
    // Route::post('/customer/login', [App\Http\Controllers\Auth\LoginController::class,'customerlogin'])->name('customer.login');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/customer/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('customer.logout');
    
Route::group(['namespace'=>'App\Http\Controllers\Front'],function(){
    Route::get('/', 'IndexController@index')->name('customer.home');
    Route::get('/product-details/{slug}', 'IndexController@ProductDetails')->name('product.details');
    Route::get('/product-quick-view/{id}', 'IndexController@ProductQuickView');

    //cart
    Route::get('/all-cart','CartController@AllCart')->name('all.cart'); //ajax request for subtotal
    Route::post('/addtocart', 'CartController@AddToCartQV')->name('add.to.cart.quickview');
    Route::get('/my-cart', 'CartController@MyCart')->name('cart');
    Route::get('/cart/empty','CartController@EmptyCart')->name('cart.empty');
    Route::get('/cartproduct/remove/{rowId}','CartController@RemoveProduct');
    Route::get('/cartproduct/updateqty/{rowId}/{qty}','CartController@UpdateQty');
    Route::get('/cartproduct/updatecolor/{rowId}/{color}','CartController@UpdateColor');
    Route::get('/cartproduct/updatesize/{rowId}/{size}','CartController@UpdateSize');

    //wishlist section
    Route::get('/add/wishlist/{id}', 'CartController@AddWishlist')->name('add.wishlist');
    Route::get('/wishlist','CartController@wishlist')->name('wishlist');
    Route::get('/clear/wishlist','CartController@Clearwishlist')->name('clear.wishlist');
    Route::get('/wishlist/product/delete/{id}','CartController@WishlistProductdelete')->name('wishlistproduct.delete');

    //review section
    Route::post('/store/review', 'ReviewController@store')->name('store.review');

    //categorywise product
    Route::get('/category/product/{id}','IndexController@categoryWiseProduct')->name('categorywise.product');
    Route::get('/subcategory/product/{id}','IndexController@SubcategoryWiseProduct')->name('subcategorywise.product');

});
