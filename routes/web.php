<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [PegawaiController::class, 'index'])->name('index');

Route::get('/tambah', [PegawaiController::class, 'tambah'])->name('tambah');

// Menyimpan data pegawai yang baru ditambahkan
Route::post('/submit', [PegawaiController::class, 'submit'])->name('submit');

// Menampilkan detail pegawai
Route::get('/detail{pegawai}', [PegawaiController::class, 'show'])->name('detail');

// Menampilkan form edit pegawai
Route::get('/edit{id}', [PegawaiController::class, 'edit'])->name('edit');

// Mengupdate data pegawai
Route::put('/update{id}', [PegawaiController::class, 'update'])->name('update');

// Menghapus data pegawai
Route::delete('/delete{id}', [PegawaiController::class, 'delete'])->name('delete');
