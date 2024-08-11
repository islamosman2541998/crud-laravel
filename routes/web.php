<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/students/create',[StudentController::class,'create'])->name('students.create');

Route::get('/students',[StudentController::class,'index'])->name('students.index');

Route::get('/students/{id}',[StudentController::class,'view'])->name('students.view');

Route::delete('/students/{id}',[StudentController::class,'destroy'])->name('students.destroy');

Route::post('/students/store',[StudentController::class,'store'])->name('students.store');

Route::get('/students/{id}/edit',[StudentController::class,'edit'])->name('students.edit');

Route::put('/students/{id}/update',[StudentController::class,'update'])->name('students.update');



Route::get('/tracks/create',[TrackController::class,'create'])->name('tracks.create');
Route::get('/tracks',[TrackController::class,'index'])->name('tracks.index');
Route::get('/tracks/{id}',[TrackController::class,'view'])->name('tracks.view');


Route::delete('/tracks/{id}',[TrackController::class,'destroy'])->name('tracks.destroy');

Route::post('/tracks/store',[TrackController::class,'store'])->name('tracks.store');

Route::get('/tracks/{id}/edit',[TrackController::class,'edit'])->name('tracks.edit');

Route::put('/tracks/{id}/update',[TrackController::class,'update'])->name('tracks.update');
