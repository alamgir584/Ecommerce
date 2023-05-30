<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function(){
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/change-password', 'AdminController@changepassword')->name('admin.password.change');
    Route::post('/admin/change-update', 'AdminController@updatepassword')->name('admin.password.update');
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
    //Brand Routes
    Route::prefix('brand')->group(function () {
        Route::get('/','BrandController@index')->name('brand.index');
        Route::post('/store','BrandController@store')->name('brand.store');
        Route::get('/delete/{id}','BrandController@delete')->name('brand.delete');
        Route::get('/edit/{id}','BrandController@edit');
        Route::post('/update','BrandController@update')->name('brand.update');
    });

    
    Route::prefix('setting')->group(function () {
        //seo setting
        Route::prefix('seo')->group(function () {
            Route::get('/','SettingController@seo')->name('seo.setting');
            Route::post('/update/{id}','SettingController@seoUpdate')->name('seo.setting.update');
        });
        //smtp setting
		// Route::group(['prefix'=>'smtp'], function(){
		// 	Route::get('/','SettingController@smtp')->name('smtp.setting');
		// 	Route::post('/update/{id}','SettingController@smtpUpdate')->name('smtp.setting.update');
	    // });
        //page setting
		// Route::group(['prefix'=>'page'], function(){
		// 	Route::get('/','PageController@index')->name('page.index');
        //     Route::get('/create','PageController@create')->name('create.page');
        //     Route::post('/store', 'PageController@store')->name('page.store');
        //     Route::get('/delete/{id}','PageController@destroy')->name('page.delete');
		// 	Route::get('/edit/{id}','PageController@edit')->name('page.edit');
		// 	Route::post('/update/{id}','PageController@update')->name('page.update');
	    // });
        //website setting
		// Route::group(['prefix'=>'website'], function(){
		// 	Route::get('/','SettingController@website')->name('website.setting');
        //     Route::post('/update/{id}','SettingController@websiteupdate')->name('website.setting.update');
	    // });
        //warehouse setting
		// Route::group(['prefix'=>'warehouse'], function(){
		// 	Route::get('/','WarehouseController@index')->name('warehouse.index');
		// 	Route::get('/create','WarehouseController@create')->name('create.warehouse');
		// 	Route::post('/store','WarehouseController@store')->name('store.warehouse');
        //     Route::get('/delete/{id}','WarehouseController@delete')->name('delete.warehouse');
        //     Route::get('/edit/{id}','WarehouseController@edit')->name('edit.warehouse');
        //     Route::post('/update/{id}','WarehouseController@update')->name('update.warehouse');
	    // });

    });

    });