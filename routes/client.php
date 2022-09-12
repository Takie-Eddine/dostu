<?php

use App\Http\Controllers\Client\AccountController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ComplaintsController;
use App\Http\Controllers\Client\ControlController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\ManageController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\RolePermissionsController;
use App\Http\Controllers\Client\SettingsController;
use App\Http\Controllers\Client\SubscriptionController;
use App\Http\Controllers\Client\ToolController;
use App\Http\Controllers\Client\UsersController;
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

////////////////////////////////ADMIN////////////////////////////




////////////////////////////////ADMIN////////////////////////////



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group(['namespace' => 'Client', 'middleware' => 'guest:client', 'prefix' => 'client'], function () {

        Route::get('login', [LoginController::class, 'login'])->name('client.login');
        Route::post('login', [LoginController::class, 'postLogin'])->name('client.post.login');
    });


    Route::group(['namespace' => 'Client', 'middleware' => 'auth:client', 'prefix' => 'client'], function () {

        Route::get('/client',[ClientController::class,'index'])->name('client.client');








        ////////////////////////////////////////////////PRODUCT/////////////////////////////////////////////////////////////////


        Route::group(['prefix' => 'products', 'middleware'=>'can:products'],function(){

            Route::get('/',[ProductController::class,'shop'])->name('client.product.index');
            Route::get('/details/{slug}',[ProductController::class,'details'])->name('client.product.details');
            Route::get('/importlist',[ProductController::class,'importlist'])->name('client.product.importlist');
            Route::get('/addtoimportlist/{id}',[ProductController::class,'addimportlist'])->name('client.product.addimportlist');
            Route::get('/addedtostore',[ProductController::class,'listproduct'])->name('client.product.listproducts');
            Route::get('/addtostore/{id}',[ProductController::class,'addtostore'])->name('client.product.addtostore');
            Route::get('/edit/{slug}',[ProductController::class,'edit'])->name('client.product.edit');
            Route::post('/push',[ProductController::class,'push'])->name('client.product.push');
            Route::get('/editvariants/{id}',[ProductController::class,'editVariant'])->name('client.product.editvariants');
            Route::post('/editvariants',[ProductController::class,'saveVariant'])->name('client.product.savevariants');
            Route::get('/getproductsbycategory/{id}',[ProductController::class,'getcategory'])->name('client.product.index.getbycategory');
            Route::get('/getproductsbyrating/{id}',[ProductController::class,'getbyrate'])->name('client.product.index.getbyrate');
            Route::get('/getproductsbyprice/{id}',[ProductController::class,'getbyprice'])->name('client.product.index.getbyprice');
            Route::get('/importlist/{id}', [ProductController::class,'destroy'])->name('client.product.importlist.destroy');
        });


        ////////////////////////////////////////////////PRODUCT/////////////////////////////////////////////////////////////////


        Route::group(['prefix' => 'store', 'middleware'=>'can:store'],function(){

            Route::get('/',[ProfileController::class , 'index'])->name('client.store.store');
            Route::get('edit/{id}',[ProfileController::class,'edit'])->name('client.store.edit');
            Route::post('update/{id}',[ProfileController::class,'update'])->name('client.store.update');
            Route::get('delete/{id}',[ProfileController::class,'delete'])->name('client.store.delete');


        });



        ////////////////////////////////////////////////Manage/////////////////////////////////////////////////////////////////


        Route::group(['prefix' => 'manage', 'middleware'=>'can:manage'], function () {


            ////////////////////////////////////////////////Roles&Permission/////////////////////////////////////////////////////////////////
            Route::group(['prefix' => 'roles-permission', 'middleware'=>'can:roles-permission'], function () {
                Route::get('/roles-permissions', [RolePermissionsController::class, 'rolepermission'])->name('client.manage.role-permissions.index');
                Route::get('/create', [RolePermissionsController::class, 'create'])->name('client.manage.role-permissions.create');
                Route::post('/store', [RolePermissionsController::class, 'store'])->name('client.manage.role-permissions.store');
                Route::get('/edit/{id}', [RolePermissionsController::class, 'edit'])->name('client.manage.role-permissions.edit');
                Route::post('/update/{id}', [RolePermissionsController::class, 'update'])->name('client.manage.role-permissions.update');

            });

            ////////////////////////////////////////////////Permission/////////////////////////////////////////////////////////////////



            ////////////////////////////////////////////////Users/////////////////////////////////////////////////////////////////


            Route::group(['prefix' => 'user' , 'middleware'=>'can:user'], function () {
                Route::get('/', [UsersController::class, 'index'])->name('client.user.index');
                Route::get('create', [UsersController::class, 'create'])->name('client.user.create');
                Route::post('store', [UsersController::class, 'store'])->name('client.user.store');
                Route::get('edit/{id}', [UsersController::class, 'edit'])->name('client.user.edit');
                Route::post('store/{id}', [UsersController::class, 'update'])->name('client.user.update');
                Route::get('view/{id}', [UsersController::class, 'view'])->name('client.user.view');
                Route::get('delete/{id}', [UsersController::class, 'delete'])->name('client.user.delete');


            });



            ////////////////////////////////////////////////Users/////////////////////////////////////////////////////////////////

        });





       ////////////////////////////////////////////////Manage/////////////////////////////////////////////////////////////////


        Route::group(['prefix' => 'settings', 'middleware'=>'can:settings'],function(){

            Route::group(['prefix' => 'account', 'middleware'=>'can:account'], function () {
                Route::get('/', [AccountController::class, 'account'])->name('client.setting.profile');
                Route::post('update/{id}', [AccountController::class, 'updateaccount'])->name('client.setting.profile.update');
                Route::get('security', [AccountController::class, 'security'])->name('client.settings.account.security');
                Route::post('update-password/{id}', [AccountController::class, 'updatesecurity'])->name('client.settings.account.security.update');

            });

            Route::group(['prefix' => 'subscription', 'middleware'=>'can:subscription'], function () {
                Route::get('/', [SubscriptionController::class, 'index'])->name('client.setting.subscription');
                Route::get('upgrade', [SubscriptionController::class, 'upgrade'])->name('client.setting.subscription.upgrade');
            });

            Route::group(['prefix' => 'store-setting', 'middleware'=>'can:store-setting'], function () {
                Route::get('/', [SettingsController::class, 'index'])->name('client.setting.store');
                Route::post('create', [SettingsController::class, 'create'])->name('client.setting.store.create');
                Route::post('defaultstore', [SettingsController::class, 'defaultstore'])->name('client.setting.store.defaultstore');
            });

        });




        Route::group(['prefix' => 'orders'],function(){

            Route::get('/',[OrderController::class,'index'])->name('client.order.order');


        });



        ////////////////////////////////////////////////COMPLAINT/////////////////////////////////////////////////////////////////
        Route::group(['prefix' => 'complaints', 'middleware'=>'can:complaints'], function () {

            Route::get('/', [ComplaintsController::class, 'index'])->name('client.complaint.index');
            Route::get('/respond/{id}', [ComplaintsController::class, 'respond'])->name('client.complaint.respond');
            Route::post('/create', [ComplaintsController::class, 'create'])->name('client.complaint.create');
            Route::get('/newcomplaint', [ComplaintsController::class, 'newcomplaint'])->name('client.complaint.newcomplaint');
            Route::post('/send', [ComplaintsController::class, 'send'])->name('client.complaint.send');
            Route::get('/view/{id}', [ComplaintsController::class, 'view'])->name('client.complaint.view');
        });


        ////////////////////////////////////////////////COMPLAINT/////////////////////////////////////////////////////////////////


















































        //---------------------------LOGOUT------------------------//
        Route::get('logout', [LoginController::class, 'logout'])->name('client.logout');
        //---------------------------LOGOUT------------------------//

    });


});



////////////////////////////////CLIENT////////////////////////////


/*Route::get('/client',[ClientController::class,'index'])->name('client.client');

////////////////////////////PRODUCT////////////////////////////
Route::group(['prefix' => 'products'],function(){

    Route::get('/',[ProductController::class,'shop'])->name('client.product.index');
    Route::get('/details',[ProductController::class,'details'])->name('client.product.details');
    Route::get('/wishlist',[ProductController::class,'wishlist'])->name('client.product.wishlist');
    Route::get('/checkout',[ProductController::class,'checkout'])->name('client.product.checkout');

});
////////////////////////////PRODUCT////////////////////////////


////////////////////////////SETTINGS////////////////////////////
Route::group(['prefix' => 'settings'],function(){

    Route::get('/',[SettingsController::class,'index'])->name('client.settings.settings');


});
////////////////////////////SETTINGS////////////////////////////



////////////////////////////ORDER////////////////////////////
Route::group(['prefix' => 'orders'],function(){

    Route::get('/',[OrderController::class,'index'])->name('client.order.order');


});

////////////////////////////ORDER////////////////////////////


////////////////////////////CONTROL////////////////////////////
Route::group(['prefix' => 'control'],function(){

    Route::get('/',[ControlController::class,'index'])->name('client.control.control');


});

////////////////////////////CONTROL////////////////////////////


////////////////////////////MANAGE////////////////////////////
Route::group(['prefix' => 'manage'],function(){

    Route::get('/',[ManageController::class,'index'])->name('client.manage.manage');


});

////////////////////////////MANAGE////////////////////////////



////////////////////////////Tool////////////////////////////

Route::group(['prefix' => 'tool'],function(){

    Route::get('/',[ToolController::class,'index'])->name('client.tools.tool');


});

////////////////////////////TOOL////////////////////////////




////////////////////////////////CLIENT////////////////////////////





////////////////////////////////SUPLIER////////////////////////////


Route::get('/',[SupplierController::class,'index'])->name('supplier.supplier');

////////////////////////////////SUPLIER////////////////////////////

*/
