<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;

Route::get('/', function () {
    return view('welcome');
});

// Halaman Kandidat
Route::get('/candidate', [CandidateController::class, 'index'])->middleware('auth')->name('index.index');
Route::get('/candidate/create', [CandidateController::class, 'create'])->name('index.create');
Route::post('/candidate/add', [CandidateController::class, 'add'])->name('index.add');
Route::get('/candidate/edit{id}', [CandidateController::class, 'edit'])->name('index.edit');
Route::put('/candidate/update{id}', [CandidateController::class, 'update'])->name('index.update');
Route::delete('candidate/delete{id}', [CandidateController::class, 'destroy'])->name('index.destroy');

// Halaman Login dan Registrasi
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

// Dashboard dan Logout
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
