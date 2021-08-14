<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::resource('pengguna', App\Http\Controllers\UserController::class);
    Route::resource('objek-pajak', App\Http\Controllers\ObjekPajakController::class);
    Route::resource('jbp', App\Http\Controllers\JbpController::class);
    Route::resource('fasilitas-bangunan', App\Http\Controllers\FasilitasBangunanController::class);

    Route::put('/change_password/{id}', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change_password');

    Route::post('pengguna-delete', [App\Http\Controllers\UserController::class, 'penggunaDelete'])->name('pengguna.pengguna-delete');
    Route::post('objek-pajak-delete', [App\Http\Controllers\ObjekPajakController::class, 'objekPajakDelete'])->name('objek-pajak.objek-pajak-delete');
    Route::post('fasilitas-bangunan-delete', [App\Http\Controllers\FasilitasBangunanController::class, 'fasilitasBangunanDelete'])->name('fasilitas-bangunan.fasilitas-bangunan-delete');
    Route::post('jbp-delete', [App\Http\Controllers\JbpController::class, 'jbpDelete'])->name('jbp.jbp-delete');
    
    Route::post('directory-village', [App\Http\Controllers\DirectoryController::class, 'village'])->name('directory-village');
    
    Route::post('directory-fasilitas-bangunan', [App\Http\Controllers\DirectoryController::class, 'fasilitasBangunan'])->name('directory-fasilitas-bangunan');
    Route::post('directory-fasilitas-bangunan-by-id', [App\Http\Controllers\DirectoryController::class, 'fasilitasBangunanById'])->name('directory-fasilitas-bangunan-by-id');
    Route::post('directory-jbp-by-id', [App\Http\Controllers\DirectoryController::class, 'jbpById'])->name('directory-jbp-by-id');

    Route::get('jbp-pdf/{id}', [App\Http\Controllers\JbpController::class, 'pdf'])->name('jbp.jbp-pdf');
    Route::post('jbp-create-pdf', [App\Http\Controllers\JbpController::class, 'createPdf'])->name('jbp.jbp-create-pdf');

    Route::get('fasilitas-bangunan-pdf/{id}', [App\Http\Controllers\FasilitasBangunanController::class, 'pdf'])->name('fasilitas-bangunan.pdf');
    Route::get('fasilitas-bangunan.create-pdf/{id}', [App\Http\Controllers\FasilitasBangunanController::class, 'createPdf'])->name('fasilitas-bangunan.create-pdf');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
