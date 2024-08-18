<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AuthController;




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




Route::get('/courses/create',[CoursesController::class,'create'])->name('courses.create');
Route::get('/courses',[CoursesController::class,'index'])->name('courses.index');
Route::get('/courses/{id}',[CoursesController::class,'view'])->name('courses.view');
Route::delete('/courses/{id}',[CoursesController::class,'destroy'])->name('courses.destroy');

Route::post('/courses/store',[CoursesController::class,'store'])->name('courses.store');

Route::get('/courses/{id}/edit',[CoursesController::class,'edit'])->name('courses.edit');

Route::put('/courses/{id}/update',[CoursesController::class,'update'])->name('courses.update');



//register
Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/handle-register',[AuthController::class,'handleRegister'])->name('auth.handleRegister');

//login
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/handle-login',[AuthController::class,'handleLogin'])->name('auth.handleLogin');

//logout
Route::get ('/logout',[AuthController::class,'logout'])->name('auth.logout');



 
Route::get('/login/github', [AuthController::class, 'redirectToProvider'])->name('auth.github.redirect');
 
Route::get('/login/github/callback',[AuthController::class,'handleProviderCallback'])->name('auth.github.callback');