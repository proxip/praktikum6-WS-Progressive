<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TutorialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Resource Route untuk Posts (CRUD lengkap)
// Otomatis membuat route: index, create, store, show, edit, update, destroy
Route::resource('posts', PostController::class);

/*
|--------------------------------------------------------------------------
| Tutorial Routes - Acara 13 & 14
|--------------------------------------------------------------------------
*/

// Halaman daftar tutorial
Route::get('/tutorial', [TutorialController::class, 'index'])
    ->name('tutorial.index');

// Acara 13: Tutorial Edit Data
Route::get('/tutorial/acara-13-edit-data', [TutorialController::class, 'acara13'])
    ->name('tutorial.acara13');

// Acara 14: Tutorial Delete Data
Route::get('/tutorial/acara-14-delete-data', [TutorialController::class, 'acara14'])
    ->name('tutorial.acara14');
