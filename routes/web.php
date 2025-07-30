<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfildesaController;
use App\Models\profildesa;
use App\Models\informasi;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\SuratusahaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DatadesaController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\HilderController;
use App\Http\Controllers\SuratsktmController;
use App\Models\Penduduk;
use App\Models\Agama;
use App\Models\hilder;
use App\Http\Controllers\AdminSktmController;
use App\Http\Controllers\AdminSuratusahaController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\AdminAuthController;

// =================== LOGIN ADMIN ===================
require_once "auth.php";

// ✅ Semua route admin wajib login


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/welcome', HomeController::class);

Route::get('/profil', function () { return view('profil.index');});
Route::middleware([AdminAuth::class])->get('/admin', function () {
    return view('admin.index');
});

Route::get('admin/profil',function () { return view('admin.profil.index');});
Route::resource('admin/profil', ProfildesaController::class);
Route::get('/admin/profil.index', [ProfildesaController::class, 'index'])->name('admin.profil.index');
Route::get('/admin/profil.create', [ProfildesaController::class, 'create'])->name('admin.profil.create');
Route::post('/admin/profil.store', [ProfildesaController::class, 'store'])->name('admin.profil.store');
Route::get('/admin/profil.show/{profildesa}', [ProfildesaController::class, 'show'])->name('admin.profil.show');
Route::get('/admin/profil.edit/{profildesa}', [ProfildesaController::class, 'edit'])->name('admin.profil.edit');
Route::put('/admin/profil.update/{profildesa}', [ProfildesaController::class, 'update'])->name('admin.profil.update');
Route::delete('/admin/profil.destroy/{profildesa}', [ProfildesaController::class, 'destroy'])->name('admin.profil.destroy');
Route::put('/admin/profil/update/{id}', [ProfildesaController::class, 'updateIndex'])->name('admin.profil.updateInline');

Route::get('/admin/informasi.index', [InformasiController::class, 'index'])->name('admin.informasi.index');
Route::post('/admin/informasi.store', [InformasiController::class, 'store'])->name('admin.informasi.store');
Route::get('/admin/informasi.create', [InformasiController::class, 'create'])->name('admin.informasi.create');
Route::get('/admin/informasi.show/{informasi}', [InformasiController::class, 'show'])->name('admin.informasi.show');
Route::get('/admin/informasi.edit/{informasi}', [InformasiController::class, 'edit'])->name('admin.informasi.edit');
Route::put('/admin/informasi.update/{informasi}', [InformasiController::class, 'update'])->name('admin.informasi.update');
Route::delete('/admin/informasi.destroy/{informasi}', [InformasiController::class, 'destroy'])->name('admin.informasi.destroy');

Route::get('/informasi/{id?}' ,[HomeController::class, 'informasi']);
Route::get('/layanan/{id?}' ,[HomeController::class, 'layanan']);

Route::match(['get','post'],'/permohonan-layanan/{id?}' ,[HomeController::class, 'permohonan']);
Route::match(['get','post'],'/verify_surat/{kode}' ,[HomeController::class, 'verify_surat'])->name('verify_surat');


Route::resource('admin/datadesa', DatadesaController::class);
Route::get('/admin/datadesa.index', [DatadesaController::class, 'index'])->name('admin.datadesa.index');
Route::post('/admin/datadesa.store', [DatadesaController::class, 'store'])->name('admin.datadesa.store');
Route::get('/admin/datadesa.create', [DatadesaController::class, 'create'])->name('admin.datadesa.create');
Route::get('/admin/datadesa.show/{datadesa}', [DatadesaController::class, 'show'])->name('admin.datadesa.show');
Route::get('/admin/datadesa.edit/{datadesa}', [DatadesaController::class, 'edit'])->name('admin.datadesa.edit');
Route::put('/admin/datadesa.update/{datadesa}', [DatadesaController::class, 'update'])->name('admin.datadesa.update');
Route::delete('/admin/datadesa.destroy/{datadesa}', [DatadesaController::class, 'destroy'])->name('admin.datadesa.destroy');
Route::put('/admin/penduduk.update/{id}', [DatadesaController::class, 'updateIndex'])->name('admin.penduduk.update');

Route::resource('admin/agama', AgamaController::class);
Route::get('/admin/agama.index', [AgamaController::class, 'index'])->name('admin.agama.index');
Route::post('/admin/agama.store', [AgamaController::class, 'store'])->name('admin.agama.store');
Route::get('/admin/agama.create', [AgamaController::class, 'create'])->name('admin.agama.create');
Route::get('/admin/agama.show/{agama}', [AgamaController::class, 'show'])->name('admin.agama.show');
Route::get('/admin/agama.edit/{agama}', [AgamaController::class, 'edit'])->name('admin.agama.edit');
Route::put('/admin/agama.update/{agama}', [AgamaController::class, 'update'])->name('admin.agama.update');
Route::delete('/admin/agama.destroy/{agama}', [AgamaController::class, 'destroy'])->name('admin.agama.destroy');
Route::put('/admin/agama.update/{id}', [AgamaController::class, 'updateIndex'])->name('admin.agama.updateInline');

// HILDER ROUTE
Route::resource('admin/hilder', HilderController::class);
Route::get('/admin/hilder.index', [HilderController::class, 'index'])->name('admin.hilder.index');
Route::post('/admin/hilder.store', [HilderController::class, 'store'])->name('admin.hilder.store');
Route::get('/admin/hilder.create', [HilderController::class, 'create'])->name('admin.hilder.create');
Route::get('/admin/hilder.show/{hilder}', [HilderController::class, 'show'])->name('admin.hilder.show');
Route::get('/admin/hilder.edit/{hilder}', [HilderController::class, 'edit'])->name('admin.hilder.edit');
Route::put('/admin/hilder.update/{hilder}', [HilderController::class, 'update'])->name('admin.hilder.update');
Route::delete('/admin/hilder.destroy/{hilder}', [HilderController::class, 'destroy'])->name('admin.hilder.destroy');
Route::put('/admin/hilder.updateInline/{id}', [HilderController::class, 'updateIndex'])->name('admin.hilder.updateInline');



// Route utama resource
// Route::resource('suratsktm', SuratsktmController::class);

// // Rute manual tambahan (optional, untuk kemudahan)
// Route::get('/suratsktm.index', [SuratsktmController::class, 'index'])->name('suratsktm.index');
// Route::get('/suratsktm.create', [SuratsktmController::class, 'create'])->name('suratsktm.create');
// Route::post('/suratsktm.store', [SuratsktmController::class, 'store'])->name('suratsktm.store');
// Route::get('/suratsktm.show/{suratsktm}', [SuratsktmController::class, 'show'])->name('suratsktm.show');
// Route::get('/suratsktm.edit/{suratsktm}', [SuratsktmController::class, 'edit'])->name('suratsktm.edit');
// Route::put('/suratsktm.update/{suratsktm}', [SuratsktmController::class, 'update'])->name('suratsktm.update');
// Route::delete('/suratsktm.destroy/{suratsktm}', [SuratsktmController::class, 'destroy'])->name('suratsktm.destroy');
// Route::put('/suratsktm/konfirmasi/{id}', [SuratSktmController::class, 'konfirmasi'])->name('suratsktm.konfirmasi');
// Route::get('/suratsktm/status/{id}', [SuratSKTMController::class, 'status'])->name('suratsktm.status');
// Route::get('/suratsktm/cetak/{id}', [SuratSKTMController::class, 'cetak'])->name('suratsktm.cetak');
// Route::post('/suratsktm/konfirmasi/{id}', [SuratSKTMController::class, 'konfirmasi'])->name('suratsktmkonfirmasi');
// Route::post('/suratsktm/konfirmasi/{id}', [SuratSKTMController::class, 'konfirmasi'])
//     ->middleware('auth', 'admin')
//     ->name('suratsktm.konfirmasi');


// // Optional inline update
// Route::put('/suratsktm.updateInline/{id}', [SuratsktmController::class, 'updateIndex'])->name('suratsktm.updateInline');

// // ADMIN SKTM
// Route::resource('admin/adminsktm', AdminSktmController::class);
// Route::get('/admin/adminsktm.index', [AdminSktmController::class, 'index'])->name('admin.adminsktm.index');
// Route::get('/admin/adminsktm.create', [AdminSktmController::class, 'create'])->name('admin.adminsktm.create');
// Route::post('/admin/adminsktm.store', [AdminSktmController::class, 'store'])->name('admin.adminsktm.store');
// Route::get('/admin/adminsktm.show/{adminsktm}', [AdminSktmController::class, 'show'])->name('admin.adminsktm.show');
// Route::get('/admin/adminsktm.edit/{adminsktm}', [AdminSktmController::class, 'edit'])->name('admin.adminsktm.edit');
// Route::put('/admin/adminsktm.update/{adminsktm}', [AdminSktmController::class, 'update'])->name('admin.adminsktm.update');
// Route::delete('/admin/adminsktm.destroy/{adminsktm}', [AdminSktmController::class, 'destroy'])->name('admin.adminsktm.destroy');
// Route::get('/admin/adminsktm/cetak/{id}', [AdminSktmController::class, 'cetak'])->name('adminsktm.cetak');


// // (Optional) Inline update jika kamu butuh
// Route::put('/admin/adminsktm.updateInline/{id}', [AdminSktmController::class, 'updateIndex'])->name('admin.adminsktm.updateInline');

// Route::resource('suratusaha', SuratusahaController::class);

// Route::resource('admin/adminsuratusaha', AdminSuratusahaController::class);

// Route::get('/suratusaha', [SuratusahaController::class, 'index'])->name('suratusaha.index');
// Route::get('/suratusaha/create', [SuratusahaController::class, 'create'])->name('suratusaha.create');
// Route::post('/suratusaha', [SuratusahaController::class, 'store'])->name('suratusaha.store');
// Route::get('/suratusaha/{suratusaha}', [SuratusahaController::class, 'show'])->name('suratusaha.show');
// Route::get('/suratusaha/{suratusaha}/edit', [SuratusahaController::class, 'edit'])->name('suratusaha.edit');
// Route::put('/suratusaha/{suratusaha}', [SuratusahaController::class, 'update'])->name('suratusaha.update');
// Route::delete('/suratusaha/{suratusaha}', [SuratusahaController::class, 'destroy'])->name('suratusaha.destroy');

// Route::resource('admin/adminsuratusaha', AdminSuratUsahaController::class);

// // RUTE TERPISAH DENGAN NAMA KHUSUS
// Route::get('/admin/adminsuratusaha.index', [AdminSuratUsahaController::class, 'index'])->name('admin.adminsuratusaha.index');
// Route::get('/admin/adminsuratusaha.create', [AdminSuratUsahaController::class, 'create'])->name('admin.adminsuratusaha.create');
// Route::post('/admin/adminsuratusaha.store', [AdminSuratUsahaController::class, 'store'])->name('admin.adminsuratusaha.store');
// Route::get('/admin/adminsuratusaha.show/{adminsuratusaha}', [AdminSuratUsahaController::class, 'show'])->name('admin.adminsuratusaha.show');
// Route::get('/admin/adminsuratusaha.edit/{adminsuratusaha}', [AdminSuratUsahaController::class, 'edit'])->name('admin.adminsuratusaha.edit');
// Route::put('/admin/adminsuratusaha.update/{adminsuratusaha}', [AdminSuratUsahaController::class, 'update'])->name('admin.adminsuratusaha.update');
// Route::delete('/admin/adminsuratusaha.destroy/{adminsuratusaha}', [AdminSuratUsahaController::class, 'destroy'])->name('admin.adminsuratusaha.destroy');
// // CETAK PDF (Opsional jika ada fitur cetak)
// Route::get('/admin/adminsuratusaha/cetak/{id}', [AdminSuratUsahaController::class, 'cetak'])->name('adminsuratusaha.cetak');
// // INLINE UPDATE (Opsional)
// Route::put('/admin/adminsuratusaha.updateInline/{id}', [AdminSuratUsahaController::class, 'updateInline'])->name('admin.adminsuratusaha.updateInline');



