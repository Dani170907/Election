<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CandidateController;

// $admin = 'admin';
// $candidate = 'candidate';
// $voter = 'voter';

Route::get('/', function () {
    return view('welcome');
});

// Halaman Login dan Registrasi
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

// testing API
Route::get('/api/results', [VoteController::class, 'resultsApi'])->name('api.results');
Route::get('/api/candidate/{id}', [VoteController::class, 'candidateApi'])->name('api.candidate');

// grup untuk semua halaman
Route::middleware(['auth'])->group(function (){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['admin'])->group(function () {
        // Dashboard dan Logout
        Route::get('admin', [AuthController::class, 'dashboard'])->name('dashboard');

        // Halaman Kandidat
        Route::get('admin/candidate', [CandidateController::class, 'index', 'title' => 'Halaman Kandidat'])->name('admin.candidate.index');
        Route::get('admin/candidate/create', [CandidateController::class, 'create'])->name('admin.candidate.create');
        Route::post('admin/candidate/store', [CandidateController::class, 'store'])->name('admin.candidate.store');
        Route::get('admin/candidate/edit{id}', [CandidateController::class, 'edit'])->name('admin.candidate.edit');
        Route::put('admin/candidate/update{id}', [CandidateController::class, 'update'])->name('admin.candidate.update');
        Route::delete('admin/candidate/delete{id}', [CandidateController::class, 'destroy'])->name('admin.candidate.destroy');
    });

    // Halaman Voters (user memilih satu kandidat)
    Route::get('/voter', [VoteController::class, 'index'])->name('voter.index');
    Route::post('/voter', [VoteController::class, 'store'])->name('voter.store');
    // Route::delete('/voter/reset{id}', [VoteController::class, 'reset'])->name('voter.reset');

    // Halaman hasil Voting
    Route::get('/results', [VoteController::class, 'results'])->name('voter.results');

});



Route::get('/chart', [ChartController::class, 'index']);
