<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome2');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('menu', [MenuController::class, 'qrCode']);
Route::resource('menu', MenuController::class);
Route::get('qr-code', [MenuController::class, 'qrCode'])->name('menu.qrcode');

Route::resource('reservasi', ReservasiController::class);
Route::resource('order', OrderController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('order', [OrderController::class, 'store'])->name('order.store');
    Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');
    
    Route::get('order/{order}/pay', [PaymentController::class, 'pay'])->name('order.pay');
    Route::post('order/{order}/pay', [PaymentController::class, 'process'])->name('order.process');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
