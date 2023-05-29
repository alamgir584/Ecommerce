<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function(){
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');


    //category Routes
    Route::prefix('category')->group(function () {
        Route::get('/','CategoryController@index')->name('category.index');
        Route::post('/store','CategoryController@store')->name('category.store');
        Route::get('/delete/{id}','CategoryController@delete')->name('category.delete');
        Route::get('/edit/{id}','CategoryController@edit');
        Route::post('/update','CategoryController@update')->name('category.update');
        });
    //subcategory Routes
    Route::prefix('subcategory')->group(function () {
        Route::get('/','SubcategoryController@index')->name('subcategory.index');
        Route::post('/store','SubcategoryController@store')->name('subcategory.store');
        Route::get('/delete/{id}','subcategoryController@delete')->name('subcategory.delete');
        Route::get('/edit/{id}','subcategoryController@edit');
        Route::post('/update','subcategoryController@update')->name('subcategory.update');
    });
    //childcategory Routes
    Route::prefix('childcategory')->group(function () {
        Route::get('/','ChildcategoryController@index')->name('childcategory.index');
        Route::post('/store','ChildcategoryController@store')->name('childcategory.store');
        Route::get('/delete/{id}','ChildcategoryController@delete')->name('childcategory.delete');
        Route::get('/edit/{id}','ChildcategoryController@edit');
        Route::post('/update','ChildcategoryController@update')->name('childcategory.update');
        });

    });