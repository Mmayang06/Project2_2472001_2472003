<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StafLabController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ProfileController;

Route::middleware(['checkRole:staflab'])->group(function () {
    Route::get('/staf-lab/home', [StafLabController::class, 'dashboard']);
    Route::get('/staf_lab/home', [StafLabController::class, 'dashboard']);

    Route::get('/staf-lab/bhp', [StafLabController::class, 'bhp']);
    Route::get('/staf_lab/bhp', [StafLabController::class, 'bhp']);
    
    Route::get('/staf-lab/bhp/riwayat', [StafLabController::class, 'bhpRiwayat']);
    Route::get('/staf_lab/bhp/riwayat', [StafLabController::class, 'bhpRiwayat']);
    
    Route::get('/staf-lab/daftar-inventaris', function () {
        return view('staf-lab.daftar_inventaris');
    });
    Route::get('/staf_lab/daftar-inventaris', function () {
        return view('staf-lab.daftar_inventaris');
    });
    
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
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Profil Pengguna (Semua Role)
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update']);

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

// Rute ke dashboard administrator yang dilindungi middleware
Route::middleware(['checkRole:administrator'])->group(function () {
    Route::get('/administrator/home', [AdministratorController::class, 'home']);
    Route::get('/administrator/users', [AdministratorController::class, 'users']);
    Route::get('/administrator/rooms', [AdministratorController::class, 'rooms']);
    
    // API endpoints untuk CRUD user
    Route::post('/administrator/users', [AdministratorController::class, 'storeUser']);
    Route::put('/administrator/users/{id}', [AdministratorController::class, 'updateUser']);
    Route::delete('/administrator/users/{id}', [AdministratorController::class, 'deleteUser']);

    // API endpoints untuk CRUD ruangan
    Route::post('/administrator/rooms', [AdministratorController::class, 'storeRoom']);
    Route::put('/administrator/rooms/{id}', [AdministratorController::class, 'updateRoom']);
    Route::delete('/administrator/rooms/{id}', [AdministratorController::class, 'deleteRoom']);
});

Route::middleware(['checkRole:kaprodi'])->group(function () {
    Route::get('/kaprodi/dashboard', [App\Http\Controllers\KaprodiController::class, 'dashboard']);
    Route::get('/kaprodi/draf-pengadaan', [App\Http\Controllers\KaprodiController::class, 'drafPengadaan']);
    Route::get('/kaprodi/draf-pengadaan/{id}/review', [App\Http\Controllers\KaprodiController::class, 'reviewDraft']);
    Route::post('/kaprodi/draf-pengadaan/review-item', [App\Http\Controllers\KaprodiController::class, 'reviewItem']);
    Route::get('/kaprodi/draf-pengadaan/{id}/finalize', [App\Http\Controllers\KaprodiController::class, 'finalizePage']);
    Route::post('/kaprodi/draf-pengadaan/{id}/finalize', [App\Http\Controllers\KaprodiController::class, 'finalizeDraft']);
});

Route::middleware(['checkRole:kalab'])->group(function () {
    Route::get('/kalab/dashboard', [App\Http\Controllers\KalabController::class, 'dashboard']);
    Route::get('/kalab/draf-pengadaan', [App\Http\Controllers\KalabController::class, 'drafPengadaan']);
    Route::get('/kalab/tambah-draf', [App\Http\Controllers\KalabController::class, 'tambahDraf']);
    Route::post('/kalab/simpan-draf', [App\Http\Controllers\KalabController::class, 'simpanDraf']);
    Route::post('/kalab/ajukan-draf/{id}', [App\Http\Controllers\KalabController::class, 'ajukanDraf']);
    Route::put('/kalab/draf-pengadaan/item/{id_detail}', [App\Http\Controllers\KalabController::class, 'editItem']);
    Route::delete('/kalab/draf-pengadaan/item/{id_detail}', [App\Http\Controllers\KalabController::class, 'deleteItem']);
});
