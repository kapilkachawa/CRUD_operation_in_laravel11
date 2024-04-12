<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class,'login'])->name('login');

Route::post('/login', [AuthController::class,'loginpost'])->name('login.post');

Route::get('/register',[AuthController::class,'register'])->name('user.register');

Route::post('/register', [AuthController::class,'registrationpost'])->name('registration.post');

Route::get('/', [StudentController::class,'student_display'])->middleware('auth')->name('student');

Route::get('/student_add', [StudentController::class,'student_add'])->middleware('auth')->name('add.student');

Route::post('/student_store', [StudentController::class,'student_store'])->name('store.student');

Route::get('/student_edit/{id}/edit', [StudentController::class,'student_edit'])->middleware('auth')->name('edit.student');

Route::put('/student_update/{id}/update', [StudentController::class,'student_update'])->name('edit.student');

Route::get('/student_delete/{id}/delete', [StudentController::class,'student_delete'])->name('delete.student');

Route::get('/student_view/{id}/view', [StudentController::class,'student_view'])->middleware('auth')->name('view.student');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/student_all_delete', [StudentController::class,'student_all_delete'])->name('deleteall.student');




