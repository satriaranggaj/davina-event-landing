<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BusinessInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return inertia('Dashboard');
    })->name('dashboard');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('faqs', FaqController::class);
        Route::get('settings/business-info', [BusinessInfoController::class, 'edit'])->name('business-info.edit');
        Route::post('settings/business-info', [BusinessInfoController::class, 'update'])->name('business-info.update');
    });
});

require __DIR__.'/settings.php';
