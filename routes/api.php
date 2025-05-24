<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\MentorController;
use App\Http\Controllers\Api\InternshipController;
use App\Http\Controllers\Api\CompanyController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('siswa', StudentController::class);
    Route::apiResource('gurupembimbing', MentorController::class);
    Route::apiResource('pkl', InternshipController::class);
    Route::apiResource('industri', CompanyController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});