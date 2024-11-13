<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Models\Candidate;

Route::get('/', function () {
    return view('welcome');
});

// tampilkan halaman index candidate controller
Route::get('/candidate', [CandidateController::class, 'index'])->name('index.index');

// tampilkan halaman tambah data dan kirim tambah data
Route::get('/candidate/create', [CandidateController::class, 'create'])->name('index.create');
Route::post('/candidate/add', [CandidateController::class, 'add'])->name('index.add');


Route::get('/candidate/edit{id}', [CandidateController::class, 'edit'])->name('index.edit');
Route::put('/candidate/update{id}', [CandidateController::class, 'update'])->name('index.update');
