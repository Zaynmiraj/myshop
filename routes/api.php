<?php

use App\Http\Controllers\ProductControl;
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

Route::get('/products', [ProductControl::class, 'index']);
Route::post('/data', [ProductControl::class, 'data']);
Route::post('/users', [ProductControl::class, 'Users']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/products/{id}', [ProductControl::class, 'singleproduct']);
