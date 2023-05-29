<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function(){
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');


         //subcategory Routes
         Route::prefix('category')->group(function () {
            Route::get('/','CategoryController@index')->name('category.index');
            Route::post('/store','CategoryController@store')->name('category.store');
            Route::get('/delete/{id}','CategoryController@delete')->name('category.delete');
            Route::get('/edit/{id}','CategoryController@edit');
            Route::post('/update','CategoryController@update')->name('category.update');
        });

    });