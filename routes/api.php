<?php

use App\Http\Controllers\BPJSController;
use GuzzleHttp\Client;
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

Route::get('rest', [BPJSController::class, 'rest']);
Route::post('statusantrean', [BPJSController::class, 'statusantrean']);
Route::post('ambilantrean', [BPJSController::class, 'ambilantrean']);
Route::post('sisaantrean', [BPJSController::class, 'sisaantrean']);
Route::post('batalantrean', [BPJSController::class, 'batalantrean']);
Route::post('checkin', [BPJSController::class, 'checkin']);
Route::post('infoPasienBaru', [BPJSController::class, 'infoPasienBaru']);
Route::post('jadwaloperasi', [BPJSController::class, 'jadwaloperasi']);
Route::post('jadwaloperasipasien', [BPJSController::class, 'jadwaloperasipasien']);
