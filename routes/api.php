<?php

use App\Http\Controllers\NoteBookController;
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

Route::post('/v1/notebook', [NoteBookController::class, 'create']);
Route::get('/v2/notebook', [NoteBookController::class, 'info']);
Route::get('/v5/notebook/{id}', [NoteBookController::class, 'edit']);
Route::post('/v3/notebook/{id}', [NoteBookController::class, 'update']);
Route::delete('/v4/notebook/{id}', [NoteBookController::class, 'delete']);

