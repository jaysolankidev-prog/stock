<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/stock');

Route::prefix('stock')->group(function () {
    Route::get('/setup', [AuthController::class, 'showSetup'])->name('setup');
    Route::post('/setup', [AuthController::class, 'setup'])->name('setup.store');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [StockController::class, 'index'])->name('stock.index');
        Route::get('/member', [StockController::class, 'index'])->name('stock.member');

        Route::middleware('role:admin')->group(function () {
            Route::post('/items', [StockController::class, 'store'])->name('stock.store');
            Route::post('/items/{stock}', [StockController::class, 'update'])->name('stock.update');
            Route::post('/items/{stock}/nwt', [StockController::class, 'updateNwt'])->name('stock.updateNwt');
            Route::delete('/items/{stock}', [StockController::class, 'destroy'])->name('stock.destroy');

            Route::get('/members', [MemberController::class, 'index'])->name('members.index');
            Route::post('/members', [MemberController::class, 'store'])->name('members.store');
            Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
        });
    });
});
