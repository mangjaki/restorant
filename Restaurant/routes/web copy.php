<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.main');
});
Route::get('menu', [MenuController::class, 'qrCode']);
Route::resource('menu', MenuController::class);
Route::get('qr-code', [MenuController::class, 'qrCode'])->name('menu.qrcode');