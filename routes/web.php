<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;

Route::get('/', function () {
    return view('welcome');
});

// tampilkan halaman index candidate controller
Route::get('/candidate', [CandidateController::class, 'index'])->middleware('auth')->name('index.index');

// tampilkan halaman tambah data dan kirim tambah data
Route::get('/candidate/create', [CandidateController::class, 'create'])->name('index.create');
Route::post('/candidate/add', [CandidateController::class, 'add'])->name('index.add');

// tampilkan halaman edit data dan fungsi edit data
Route::get('/candidate/edit{id}', [CandidateController::class, 'edit'])->name('index.edit');
Route::put('/candidate/update{id}', [CandidateController::class, 'update'])->name('index.update');

// route hapus untuk fungsi hapus
Route::delete('canididate/delete{id}', [CandidateController::class, 'destroy'])->name('index.destroy');

// tampilkan halaman login dan kirim data login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

// tampilkan halaman registrasi dan kirim data register
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
