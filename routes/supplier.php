<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ControlController;
use App\Http\Controllers\Client\ManageController;
use App\Http\Controllers\Client\OrderController;

use App\Http\Controllers\Client\SettingsController;
use App\Http\Controllers\Client\ToolController;
use App\Http\Controllers\Supplier\LoginController;
use App\Http\Controllers\Supplier\ProductController;
use App\Http\Controllers\Supplier\ProfileController;
use App\Http\Controllers\Supplier\SupplierController;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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








////////////////////////////////SUPLIER////////////////////////////




Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group(['namespace' => 'Supplier', 'middleware' => 'guest:supplier', 'prefix' => 'supplier'], function () {

        Route::get('login', [LoginController::class, 'login'])->name('supplier.login');
        Route::post('login', [LoginController::class, 'postLogin'])->name('supplier.post.login');
    });


    Route::group(['namespace' => 'Supplier', 'middleware' => 'auth:supplier', 'prefix' => 'supplier'], function () {

        Route::get('/', [SupplierController::class, 'index'])->name('supplier.supplier');

        ////////////////////////////////////////////////PROFILE/////////////////////////////////////////////////////////////////
        Route::group(['prefix' => 'profile'], function () {

            Route::get('/', [ProfileController::class, 'profile'])->name('supplier.profile.profile');
            Route::post('/create', [ProfileController::class, 'store'])->name('supplier.profile.create');
            Route::post('/update', [ProfileController::class, 'update'])->name('supplier.profile.update');
        });


        ////////////////////////////////////////////////PROFILE/////////////////////////////////////////////////////////////////



        ////////////////////////////////////////////////PRODUCTS/////////////////////////////////////////////////////////////////

        Route::group(['prefix' => 'products'], function () {

            Route::get('/', [ProductController::class, 'index'])->name('supplier.product.index');
            Route::get('create', [ProductController::class, 'create'])->name('supplier.product.create');
            Route::post('store', [ProductController::class, 'store'])->name('supplier.product.store');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('supplier.product.edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('supplier.product.update');
            Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('supplier.product.delete');
            Route::get('view/{id}', [ProductController::class, 'view'])->name('supplier.product.view');
            Route::get('deleteimage/{id}',[ProductController::class, 'deleteimage'])->name('supplier.product.edit.deleteimage');

        });




        Route::get('test', function(){
            return view('supplier.test');
        });

        Route::post('test', function(){
            return view('supplier.test');
        });


        ////////////////////////////////////////////////PRODUCT/////////////////////////////////////////////////////////////////


        //---------------------------LOGOUT------------------------//
        Route::get('logout', [LoginController::class, 'logout'])->name('supplier.logout');
        //---------------------------LOGOUT------------------------//



    });
});
////////////////////////////////SUPLIER////////////////////////////
