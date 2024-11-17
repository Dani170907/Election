<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\CandidateController;

Route::get('/', function () {
    return view('welcome');
});


// Halaman Login dan Registrasi
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

// Dashboard dan Logout
Route::get('dashboard', [AuthController::class, 'dashboard'])->Middleware('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Kandidat
Route::get('/candidate', [CandidateController::class, 'index'])->Middleware('auth')->name('index.index');
Route::get('/candidate/create', [CandidateController::class, 'create'])->name('index.create');
Route::post('/candidate/store', [CandidateController::class, 'store'])->name('index.store');
Route::get('/candidate/edit{id}', [CandidateController::class, 'edit'])->name('index.edit');
Route::put('/candidate/update{id}', [CandidateController::class, 'update'])->name('index.update');
Route::delete('candidate/delete{id}', [CandidateController::class, 'destroy'])->name('index.destroy');

// Halaman Voters
Route::get('/voter', [VoteController::class, 'index'])->name('voter.index');
Route::post('/voter', [VoteController::class, 'store'])->name('voter.store');
