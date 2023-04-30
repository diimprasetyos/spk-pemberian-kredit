<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PemohonController;
use App\Http\Controllers\BerkasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// greeting dashboard user route
// Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');

// route penilaian 
Route::get('/penilaian', [App\Http\Controllers\PenilaianController::class, 'index'])->name('alternatif');
Route::get('/normalisasi', [App\Http\Controllers\PenilaianController::class, 'normalisasi'])->name('normalisasi');
// route pemohon
Route::get('/pemohon', [App\Http\Controllers\PemohonController::class, 'index'])->name('pemohon');
// route berkas
Route::get('/berkas', [App\Http\Controllers\BerkasController::class, 'index'])->name('berkas');
Route::get('/tambahberkas', [App\Http\Controllers\BerkasController::class, 'create'])->name('tambahberkas');
Route::get('/editberkas', [App\Http\Controllers\BerkasController::class, 'edit'])->name('editberkas');
// route keluhan
Route::get('/keluhan', [App\Http\Controllers\KeluhanController::class, 'index'])->name('keluhan');

// route kriteria
Route::get('/kriteria', [App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria');
Route::get('/bobotkriteria', [App\Http\Controllers\KriteriaController::class, 'bobotkriteria'])->name('bobotkriteria');
Route::get('/subkriteria', [App\Http\Controllers\KriteriaController::class, 'subkriteria'])->name('subkriteria');
// route hasil & report
Route::get('/hasil', [App\Http\Controllers\HasilController::class, 'index'])->name('hasil');
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');

//crud
Route::get('/tambahpemohon', [App\Http\Controllers\PemohonController::class, 'create'])->name('tambahpemohon');
Route::get('/editpemohon', [App\Http\Controllers\PemohonController::class, 'edit'])->name('editpemohon');


Route::resource('pemohons', App\Http\Controllers\PemohonController::class);
Route::resource('berkas', App\Http\Controllers\BerkasController::class);