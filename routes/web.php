<?php

use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BpjsController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LampiranController;
use App\Http\Controllers\Gaji_pokokController;
use App\Http\Controllers\Lihat_gajiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\Bpjs_karyawanController;
use App\Http\Controllers\Status_karyawanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('index');
// })->name('welcome');

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->resource('/karyawan', KaryawanController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/jabatan', JabatanController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/divisi', DivisiController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/golongan', GolonganController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/pendidikan', PendidikanController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/status_karyawan', Status_karyawanController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/gaji_pokok', Gaji_pokokController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/dokumen', DokumenController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/bank', BankController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/lampiran', LampiranController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/bpjs', BpjsController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/bpjs_karyawan', Bpjs_karyawanController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/gaji', GajiController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/lihat_gaji', Lihat_gajiController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('/absensi', AbsensiController::class);
