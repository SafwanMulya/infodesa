<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\HilderController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DatadesaController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\ProfildesaController;
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardAdmin::class, 'index'])->name('dashboard');
    Route::resource('/profil', ProfildesaController::class);
    Route::resource('/informasi', InformasiController::class);
    Route::resource('/datadesa', DatadesaController::class);
    Route::resource('/agama', AgamaController::class);
    Route::resource('/hilder', HilderController::class);


    Route::resource('/layanan', LayananController::class);
    Route::resource('/permohonan', PermohonanController::class);
    Route::post('permohonan/cetak/{permohonan}', [PermohonanController::class, 'cetak_permohonan'])->name('permohonan.cetak');
    Route::post('permohonan/ttd/{permohonan}', [PermohonanController::class, 'ttd_permohonan'])->name('permohonan.ttd');


});
