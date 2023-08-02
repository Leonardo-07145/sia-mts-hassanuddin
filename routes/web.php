<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\DashboardKepalaSekolahController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\TanggalPresensiController;
use App\Http\Controllers\TahunAjaranController;

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
//Route Login
Route::get('/', [LoginAdminController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginAdminController::class, 'authenticate']);
Route::post('/logout', [LoginAdminController::class, 'logout']);


//Route TU
Route::resource('guru', GuruController::class)->middleware('tu');
Route::resource('siswa', SiswaController::class)->middleware('tu');
// Route::get('/pembayaran/create/{id}',[PembayaranController::class,'create2'])->name('pembayaran.create2')->middleware('tu');
Route::resource('pembayaran', PembayaranController::class)->middleware('tu');
Route::resource('tahunajaran', TahunAjaranController::class)->middleware('tu');
Route::get('/tahunajaran/edit2/{id}',[TahunAjaranController::class,'edit2'])->name('tahunajaran.edit2')->middleware('tu');
Route::put('/tahunajaran/update2/{id}',[TahunAjaranController::class,'update2'])->name('tahunajaran.update2')->middleware('tu');
Route::delete('/tahunajaran/delete2/{id}',[TahunAjaranController::class,'delete2'])->name('tahunajaran.delete2')->middleware('tu');

//Route Kesiswaan
Route::resource('jadwal', JadwalController::class)->middleware('kesiswaan');

//Route Wali Kelas
Route::resource('presensi', PresensiController::class)->middleware('walikelas');
Route::get('/presensi/create/{id}',[PresensiController::class,'create2'])->name('presensi.create2')->middleware('walikelas');
Route::get('/tgl_presensi/create/{id}',[TanggalPresensiController::class,'create'])->middleware('walikelas');
Route::get('/presensi/show/{id}',[TanggalPresensiController::class,'show'])->middleware('walikelas');
Route::post('/tgl_presensi/store',[TanggalPresensiController::class,'store'])->middleware('walikelas');
Route::resource('nilai', NilaiController::class)->middleware('walikelas');
Route::get('/nilai/show2/{id}',[NilaiController::class,'show2'])->name('nilai.show2')->middleware('walikelas');
Route::get('/nilai/create2/{id}',[NilaiController::class,'create2'])->name('nilai.create2')->middleware('walikelas');

//Route Kepala Sekolah
Route::get('/dataguru', [DashboardKepalaSekolahController::class, 'getdataguru'])->middleware('kepalasekolah');
Route::get('/showguru/{id}', [DashboardKepalaSekolahController::class, 'showguru'])->middleware('kepalasekolah');
Route::get('/datasiswa', [DashboardKepalaSekolahController::class, 'getdatasiswa'])->middleware('kepalasekolah');
Route::get('/showsiswa/{id}', [DashboardKepalaSekolahController::class, 'showsiswa'])->middleware('kepalasekolah');

//Route Siswa
// Route::get('/siswadashboard', function(){
//     return view('siswa.pembayaran.index');
// })->middleware('auth:siswa');
Route::get('/pembayaransiswa', [DashboardSiswaController::class, 'getpembayaran'])->middleware('auth:siswa');
Route::get('/jadwalsiswa', [DashboardSiswaController::class, 'getjadwal'])->middleware('auth:siswa');
Route::get('/presensisiswa', [DashboardSiswaController::class, 'getpresensi'])->middleware('auth:siswa');
Route::get('/nilaisiswa', [DashboardSiswaController::class, 'getnilai'])->middleware('auth:siswa');
