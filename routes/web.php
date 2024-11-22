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

// testing API
Route::get('/api-results', [VoteController::class, 'resultsApi'])->name('api.results');
Route::get('api/candidate/{id}', [VoteController::class, 'candidateApi']);

// grup untuk semua halaman
Route::middleware(['auth'])->group(function (){

    Route::middleware(['admin'])->group(function () {
        // Dashboard dan Logout
        Route::get('admin', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        // Halaman Kandidat
        Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate.index');
        Route::get('/candidate/create', [CandidateController::class, 'create'])->name('candidate.create');
        Route::post('/candidate/store', [CandidateController::class, 'store'])->name('candidate.store');
        Route::get('/candidate/edit{id}', [CandidateController::class, 'edit'])->name('candidate.edit');
        Route::put('/candidate/update{id}', [CandidateController::class, 'update'])->name('candidate.update');
        Route::delete('candidate/delete{id}', [CandidateController::class, 'destroy'])->name('candidate.destroy');
    });

    // Halaman Voters (user memilih satu kandidat)
    Route::get('/voter', [VoteController::class, 'index'])->name('voter.index');
    Route::post('/voter', [VoteController::class, 'store'])->name('voter.store');
    // Route::delete('/voter/reset{id}', [VoteController::class, 'reset'])->name('voter.reset');

    // Halaman hasil Voting
    Route::get('/results', [VoteController::class, 'results'])->name('voter.results');

});

