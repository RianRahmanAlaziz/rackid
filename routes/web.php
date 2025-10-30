<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

// Slug Handler
Route::get('/dashboard/product/checkslug', [ProductController::class, 'checkslug'])->name('product.checkslug');
Route::get('/dashboard/category/checkslug', [CategoryController::class, 'checkslug'])->name('category.checkslug');



Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'product'      => ProductController::class,
        'category'     => CategoryController::class,
        // 'file-manager' => FileManagerController::class,
        // 'info'         => InfoController::class,
        // 'clients'      => ClientsController::class,
        // 'contact'      => ContactController::class,
        // 'whychoose'    => WhychooseController::class,
        // 'aboutus'      => AboutusController::class,
        // 'banners'      => BannerController::class, // ✅ konsisten pakai plural
    ]);
});
