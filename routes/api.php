<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('save-image-data', [ProfileController::class, 'uploadFileSelectoresForm']);
Route::post('save-image-trivia', [ProfileController::class, 'uploadFileSelectoresFormTrivia']);

Route::post('/send-email', [ProfileController::class, 'sendEmail']);