<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PemohonController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CriteriaRatingController;
use App\Http\Controllers\CriteriaWeightController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NormalizationController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PinjamanController;
use App\Models\CriteriaRating;
use App\Models\CriteriaWeight;
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

Route::resources([
    'alternatives' => AlternativeController::class,
    'criteriaratings' => CriteriaRatingController::class,
    'criteriaweights' => CriteriaWeightController::class,
    'pemohons' => PemohonController::class,
    'berkas' => BerkasController::class,
    'riwayats' => RiwayatController::class,
    'pinjamans' => PinjamanController::class,

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('decision', [DecisionController::class, 'index']);

Route::get('normalization', [NormalizationController::class, 'index']);

Route::get('rank', [RankController::class, 'index']);

// print route
Route::get('/alternative/print', [AlternativeController::class, 'print'])->name('alternative.print');
Route::get('/pemohon/print', [PemohonController::class, 'print'])->name('pemohons.print');
Route::get('/berkas/print', [BerkasController::class, 'print'])->name('berkas.print');
Route::get('/decision/print', [DecisionController::class, 'print'])->name('decision.print');
Route::get('/normalization/print', [NormalizationController::class, 'print'])->name('normalization.print');
Route::get('/pinjaman/print', [PinjamanController::class, 'print'])->name('pinjaman.print');
Route::get('/rank/print', [RankController::class, 'print'])->name('rank.print');
Route::get('/riwayat/print', [RiwayatController::class, 'print'])->name('riwayats.print');
