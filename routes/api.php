<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\FreteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/fretes', [FreteController::class, 'index'])->name('fretes');
    Route::get('/frete/{id}', [FreteController::class, 'find'])->name('frete');
    Route::post('/frete', [FreteController::class, 'create'])->name('frete.create');
    Route::put('/frete/{id}', [FreteController::class, 'update'])->name('frete.update');
    Route::delete('/frete/{id}', [FreteController::class, 'delete'])->name('frete.delete');
});