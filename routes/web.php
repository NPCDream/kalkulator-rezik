<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KariawanController;
use App\Http\Controllers\petugaskeamananController;
use App\Http\Controllers\petugaskebersihanController;
use App\Http\Controllers\gajipetugaskeamananController;
use App\Http\Controllers\gajipetugaskebersihanController;
use App\Http\Controllers\gajikariawanController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');
Route::get('/home', [ContenController::class, 'index'])->name('home.index')->middleware('auth');

Route::get('/contak', [ContenController::class, 'contak']);
Route::resource('mapel', MapelController::class);
Route::resource('petugaskeamanan', petugaskeamananController::class)->middleware('auth');
Route::resource('petugaskebersihan', petugaskebersihanController::class)->middleware('auth');
Route::resource('gajipetugaskebersihan', gajipetugaskebersihanController::class)->middleware('auth');
Route::resource('gajipetugaskeamanan', gajipetugaskeamananController::class)->middleware('auth');
Route::resource('gajikariawan', gajikariawanController::class)->middleware('auth');
Route::resource('transaksi', TransaksiController::class)->middleware('auth');
Route::resource('kariawan', KariawanController::class)->middleware('auth');
Route::resource('pembayaran', PembayaranController::class)->middleware('auth');
Route::resource('laundrie', LaundryController::class)->middleware('auth');
Route::resource('pembeli', PembeliController::class)->middleware('auth');
Route::resource('siswa', SiswaController::class)->middleware('auth');
Route::resource('buku', BukuController::class)->middleware('auth');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/changePassword',[UserController::class,'showChangePasswordForm']);
Route::post('/changePassword',[UserController::class,'changePassword'])->name('changePassword');
