<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/staf-lab/home', function () {
    return view('staf-lab.home');
});

Route::get('/staf_lab/home', function () {
    return view('staf-lab.home');
});

Route::get('/staf-lab/bhp', function () {
    return view('staf-lab.bhp');
});

Route::get('/staf_lab/bhp', function () {
    return view('staf-lab.bhp');
});



Route::get('/', function () {
    return view('landing');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Rute langsung ke dashboard staf admin untuk keperluan testing (tanpa login)
Route::get('/stafadmin/dashboard', function () {
    return view('stafadmin.dashboard');
});
Route::get('/stafadmin', function () {
    return view('stafadmin.dashboard');
});
Route::get('/stafadmin/daftar-inventaris', function () {
    return view('stafadmin.daftar_inventaris');
});
Route::get('/stafadmin/update-inventaris/{id}', function ($id) {
    return view('stafadmin.update_inventaris');
});
Route::get('/stafadmin/penerimaan-barang', function () {
    return view('stafadmin.penerimaan_barang');
});
Route::get('/stafadmin/draf-pengadaan', function () {
    return view('stafadmin.draf_pengadaan');
});
