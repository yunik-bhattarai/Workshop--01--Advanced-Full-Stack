<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students/export/csv', [StudentController::class, 'exportCsv'])
    ->name('students.export');

Route::post('/students/import/csv', [StudentController::class, 'importCsv'])
    ->name('students.import');

Route::resource('students', StudentController::class);

Route::resource('courses', CourseController::class);