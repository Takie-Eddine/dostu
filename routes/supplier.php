<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ControlController;
use App\Http\Controllers\Client\ManageController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\SettingsController;
use App\Http\Controllers\Client\ToolController;
use App\Http\Controllers\Supplier\LoginController;
use App\Http\Controllers\Supplier\ProductController as SupplierProductController;
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

/*Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	Route::get('/',[SupplierController::class,'index'])->name('supplier.supplier');
});*/


Route::group(['namespace' => 'Supplier' , 'middleware' => 'guest:supplier' , 'prefix' => 'supplier'],function(){

    Route::get('login',[LoginController::class,'login']) -> name('supplier.login');
    Route::post('login',[LoginController::class,'postLogin']) -> name('supplier.post.login');
});


    Route::group(['namespace' => 'Supplier','middleware'=> 'auth:supplier','prefix' =>'supplier'],function(){

        Route::get('/',[SupplierController::class,'index'])->name('supplier.supplier');

////////////////////////////////////////////////PROFILE/////////////////////////////////////////////////////////////////
    Route::group(['prefix' => 'profile'],function(){

        Route::get('/',[ProfileController::class,'profile'])->name('supplier.profile.profile');
        Route::post('/create',[ProfileController::class,'store'])->name('supplier.profile.create');
        Route::post('/update',[ProfileController::class,'update'])->name('supplier.profile.update');
    });


////////////////////////////////////////////////PROFILE/////////////////////////////////////////////////////////////////



////////////////////////////////////////////////PRODUCTS/////////////////////////////////////////////////////////////////

Route::group(['prefix' => 'products'],function(){

    Route::get('/',[SupplierProductController::class,'index'])->name('supplier.product.index');
    Route::get('create',[SupplierProductController::class,'create']) -> name('supplier.product.create');
    Route::post('store',[SupplierProductController::class,'store']) -> name('supplier.product.store');
    Route::get('edit/{id}',[SupplierProductController::class,'edit']) -> name('supplier.branproductds.edit');
    Route::post('update/{id}',[SupplierProductController::class,'update']) -> name('supplier.product.update');
    Route::get('delete/{id}',[SupplierProductController::class,'destroy']) -> name('supplier.product.delete');

});





////////////////////////////////////////////////PROFILE/////////////////////////////////////////////////////////////////
});


////////////////////////////////SUPLIER////////////////////////////


