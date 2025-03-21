<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    // Các đường dẫn trong nhóm admin sẽ đặt trong đây
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Route quản lý sản phẩm
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{id}/show', [ProductController::class, 'show'])->name('show');
});
    
});

