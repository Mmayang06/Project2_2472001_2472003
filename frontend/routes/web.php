<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\StafLabController;

Route::middleware(['checkRole:staflab'])->group(function () {
    Route::get('/staf-lab/home', [StafLabController::class, 'dashboard']);
    Route::get('/staf_lab/home', [StafLabController::class, 'dashboard']);

    Route::get('/staf-lab/bhp', [StafLabController::class, 'bhp']);
    Route::get('/staf_lab/bhp', [StafLabController::class, 'bhp']);
    
    // API endpoints untuk aksi AJAX
    Route::post('/staf-lab/bhp/consume', [StafLabController::class, 'consumeBhp']);
    Route::post('/staf-lab/bhp/restock', [StafLabController::class, 'restockBhp']);

    Route::get('/staf-lab/maintenance', [StafLabController::class, 'maintenance']);
    Route::get('/staf_lab/maintenance', [StafLabController::class, 'maintenance']);

    // Simpan log maintenance baru (juga mengurangi stok BHP)
    Route::post('/staf-lab/maintenance', [StafLabController::class, 'storeMaintenance']);
});




Route::get('/', function () {
    return view('landing');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Rute ke dashboard staf admin yang dilindungi middleware
Route::middleware(['checkRole:stafadmin'])->group(function () {
    Route::get('/stafadmin/dashboard', [App\Http\Controllers\StafAdminController::class, 'dashboard']);
    Route::get('/stafadmin', [App\Http\Controllers\StafAdminController::class, 'dashboard']);
    Route::get('/stafadmin/daftar-inventaris', function () {
        return view('stafadmin.daftar_inventaris');
    });
    Route::get('/stafadmin/update-inventaris/{id}', function ($id) {
        return view('stafadmin.update_inventaris', ['id' => $id]);
    });
    Route::get('/stafadmin/penerimaan-barang', function () {
        return view('stafadmin.penerimaan_barang');
    });
    Route::get('/stafadmin/draf-pengadaan', [App\Http\Controllers\StafAdminController::class, 'drafPengadaan']);
    Route::put('/stafadmin/draf-pengadaan/{id}/status', [App\Http\Controllers\StafAdminController::class, 'updateStatusPengadaan']);
    Route::post('/stafadmin/draf-pengadaan/cek-label', [App\Http\Controllers\StafAdminController::class, 'cekLabel']);
    Route::post('/stafadmin/draf-pengadaan/terima', [App\Http\Controllers\StafAdminController::class, 'prosesTerima']);
});
