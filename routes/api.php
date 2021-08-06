<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientsApiController;
use \App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/clients-api/store', [ClientsApiController::class, 'store'])->name('clients-api.store');
Route::get('/clients-api/list', [ClientsApiController::class, 'index'])->name('clients-api.list');
Route::get('/clients-api/show', [ClientsApiController::class, 'show'])->name('clients-api.show');