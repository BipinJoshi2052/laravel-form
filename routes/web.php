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


Auth::routes();

Route::get('/', [App\Http\Controllers\ClientsController::class, 'index'])->name('clients.index');
Route::get('/clients/post', [App\Http\Controllers\ClientsController::class, 'post'])->name('clients.post');
Route::post('/clients/store', [App\Http\Controllers\ClientsController::class, 'store'])->name('clients.store');
Route::get('/clients/show/{id}', [App\Http\Controllers\ClientsController::class, 'show'])->name('clients.show');
Route::get('/clients/csv_export', [App\Http\Controllers\ClientsController::class, 'csv_export'])->name('clients.csv_export');

