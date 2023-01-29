<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
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

// Read
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [App\Http\Controllers\ContactController::class, 'index'])->name('home')->middleware('auth');
Route::post('/see', [App\Http\Controllers\ContactController::class, 'show'])->name('see')->middleware('auth');

// Update
Route::post('/edit', [App\Http\Controllers\ContactController::class, 'edit'])->name('ed')->middleware('auth');
Route::put('/edit', [App\Http\Controllers\ContactController::class, 'update'])->name('update');

// Create
Route::get('/create', function () {
    return view('create');
})->name('create')->middleware('auth');

// Route::get('/home', [App\Http\Controllers\ContactController::class, 'store'])->name('create');
Route::post('/create', [App\Http\Controllers\ContactController::class, 'store'])->middleware('auth');

// Delete
Route::delete('/home', [App\Http\Controllers\ContactController::class, 'destroy'])->name('delete')->middleware('auth');

// Delete Multiple records
Route::delete('/delete', [App\Http\Controllers\ContactController::class, 'destroyMulti'])->name('deleteMulti')->middleware('auth');

// Search
Route::any('/search', [App\Http\Controllers\ContactController::class, 'search'])->name('search')->middleware('auth');
