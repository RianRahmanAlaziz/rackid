<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;



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
        'gallery'      => GalleryController::class,
        'banner'       => BannerController::class,
        'document'     => DokumentController::class,
        // 'clients'      => ClientsController::class,
        // 'contact'      => ContactController::class,
        // 'whychoose'    => WhychooseController::class,
        // 'aboutus'      => AboutusController::class,
    ]);
});


Route::controller(FrontendController::class)->group(function () {
    Route::get('/', [FrontendController::class, 'home'])->name('home');
    Route::get('/aboutus', [FrontendController::class, 'aboutus'])->name('aboutus');
    Route::get('/produk', [FrontendController::class, 'produk'])->name('produk');
    Route::get('/produk/{slug}', [FrontendController::class, 'detail_produk'])->name('detail_produk');
    Route::get('/brosur', [FrontendController::class, 'brosur'])->name('brosur');
    Route::get('/datasheet', [FrontendController::class, 'datasheet'])->name('datasheet');
    Route::get('/media-foto', [FrontendController::class, 'media_foto'])->name('media_foto');
    Route::get('/media-video', [FrontendController::class, 'media_video'])->name('media_video');
    Route::get('/contactus', [FrontendController::class, 'contactus'])->name('contactus');
});
