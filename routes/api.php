<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('/auth/register', AuthController::class.'@register');
Route::post('/auth/login', AuthController::class.'@login');

// Students
Route::get('/students', StudentController::class.'@index');
Route::get('/students/{id}', StudentController::class.'@show');
Route::post('/students', StudentController::class.'@store');
Route::put('/students/{id}', StudentController::class.'@update');
Route::delete('/students/{id}', StudentController::class.'@destroy');

// Courses
Route::get('/courses', CourseController::class.'@index');
Route::get('/courses/{id}', CourseController::class.'@show');
Route::post('/courses', CourseController::class.'@store');
Route::put('/courses/{id}', CourseController::class.'@update');
Route::delete('/courses/{id}', CourseController::class.'@destroy');

// Enrollments
Route::post('/enrollments', StudentController::class.'@enroll');
Route::get('/enrollments', StudentController::class.'@list');
Route::delete('/enrollments/{id}', StudentController::class.'@destroy');
