<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('produk',ProdukController::class);

// Route::get('/apiproduk', [ProdukController::class, 'index']);
Route::get('/detailproduk/{id}', [ProdukController::class, 'detail']);
// Route::post('/createproduk', [ProdukController::class, 'store']);
// Route::apiResource('/updateproduk/{id}', [ProdukController::class, 'update']);
// Route::apiResource('/deleteproduk/{id}', [ProdukController::class, 'destroy']);

Route::get('/datauser', [UserController::class, 'index']);
Route::get('/totaluser', [UserController::class, 'total']);