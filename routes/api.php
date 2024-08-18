<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/show/{id}', [StudentController::class, 'show']);

Route::post('/students/store', [StudentController::class, 'store']);
Route::post('/students/update/{id}', [StudentController::class, 'update']);
Route::delete('/students/delete/{id}', [StudentController::class, 'delete']);

