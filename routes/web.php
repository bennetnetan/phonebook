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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\ContactController::class, 'index'])->name('home');
Route::post('/see', [App\Http\Controllers\ContactController::class, 'show'])->name('see');

// Update
Route::get('/edit', [App\Http\Controllers\ContactController::class, 'edit'])->name('edit');
Route::put('/edit/{$id}', [App\Http\Controllers\ContactController::class, 'update'])->name('update  ');
// Create
Route::get('/create', function () {
    return view('create');
})->name('create');

// Route::get('/home', [App\Http\Controllers\ContactController::class, 'store'])->name('create');
Route::post('/create', [App\Http\Controllers\ContactController::class, 'store']);
// Delete
Route::get('/delete', [App\Http\Controllers\ContactController::class, 'edit'])->name('delete');
