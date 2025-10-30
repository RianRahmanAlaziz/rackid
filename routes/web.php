<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/', function () {
    return view('welcome');
});

// Slug Handler
Route::get('/dashboard/product/checkslug', [ProductController::class, 'checkslug'])->name('product.checkslug');
Route::get('/dashboard/category/checkslug', [CategoryController::class, 'checkslug'])->name('category.checkslug');



Route::prefix('dashboard')->group(function () {
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


Route::controller(FrontendController::class)->group(function () {
    Route::get('/', [FrontendController::class, 'home'])->name('home');
    Route::get('/aboutus', [FrontendController::class, 'aboutus'])->name('aboutus');
    Route::get('/produk', [FrontendController::class, 'produk'])->name('produk');
    Route::get('/detail_produk', [FrontendController::class, 'detail_produk'])->name('detail_produk');
    Route::get('/brosur', [FrontendController::class, 'brosur'])->name('brosur');
    Route::get('/datasheet', [FrontendController::class, 'datasheet'])->name('datasheet');
    Route::get('/media_foto', [FrontendController::class, 'media_foto'])->name('media_foto');
    Route::get('/media_video', [FrontendController::class, 'media_video'])->name('media_video');
    Route::get('/contactus', [FrontendController::class, 'contactus'])->name('contactus');
});
