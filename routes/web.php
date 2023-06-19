<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


// login , register Route

Route::middleware(['admin_auth'])->group(function() {

    Route::redirect('/','loginPage');
    Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
    Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');

});


Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Admin
    Route::middleware(['admin_auth'])->group(function() {
        // Category
        Route::group(['prefix'=>'category'], function() {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('createPage', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        // Password
        Route::group(['prefix'=>'admin'], function() {

            // Password
            Route::get('password/change', [AdminController::class, 'passwordChange'])->name('admin#passwordChangePage');
            Route::post('password/update', [AdminController::class, 'passwordUpdate'])->name('admin#passwordUpdate');

            // Account Info
            Route::get('account/detail', [AdminController::class, 'accountDetail'])->name('account#detail');
            Route::get('account/edit', [AdminController::class, 'accountEdit'])->name('account#edit');
            Route::post('account/update/{id}', [AdminController::class, 'accountUpdate'])->name('account#update');

            // Admin Account List
            Route::get('list', [AdminController::class, 'adminList'])->name('admin#list');
            Route::get('detail/{id}', [AdminController::class, 'adminDetail'])->name('admin#detail');
            Route::get('delete/{id}', [AdminController::class, 'adminDelete'])->name('admin#delete');
            Route::get('changeRole/{id}', [AdminController::class, 'changeRole'])->name('admin#changeRole');
            Route::post('roleUpdate/{id}', [AdminController::class, 'roleUpdate'])->name('admin#roleUpdate');

        });

        // Products
        Route::prefix('products')->group(function() {
            Route::get('list', [ProductController::class, 'productList'])->name('product#list');
            Route::get('create', [ProductController::class, 'productCreate'])->name('product#create');
            Route::post('create', [ProductController::class, 'create'])->name('product#createPage');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
            Route::get('detail/{id}', [ProductController::class, 'detail'])->name('product#detail');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product#edit');
            Route::post('update', [ProductController::class, 'update'])->name('product#update');
        });
    });


    // User
    // home
    Route::group(['prefix'=>'user','middleware'=>'user_auth'], function() {

        Route::get('homePage', [UserController::class, 'home'])->name('user#home');
        Route::get('/filter/{id}', [UserController::class, 'filter'])->name('user#filter');

        // Product
        Route::prefix('product')->group(function() {
            Route::get('detail/{id}', [UserController::class, 'details'])->name('product#detail');
        });

        Route::prefix('password')->group(function() {
            Route::get('detail', [UserController::class, 'detail'])->name('account#detail');
            Route::get('change', [UserController::class, 'changePasswordPage'])->name('user#changePasswordPage');
            Route::post('change', [UserController::class, 'changePassword'])->name('user#changePassword');
        });
    });
 });
