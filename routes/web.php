<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\ContactController;
use App\Http\Controllers\Firebase\Admin\ClassController;
use App\Http\Controllers\Firebase\Admin\StaffController;
use App\Http\Controllers\Firebase\Admin\StudentController;
use App\Http\Controllers\Firebase\Admin\SubjectController;
use App\Http\Controllers\Firebase\Admin\DashboardController;
use App\Http\Controllers\Firebase\Admin\SchoolInfoController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [SchoolInfoController::class, 'index'])->name('dashboard');
Route::get('/dashboard/school-edit', [SchoolInfoController::class, 'edit'])->name('dashboard.edit');
Route::put('/dashboard/school-update', [SchoolInfoController::class, 'update'])->name('dashboard.update');

Route::resource('dashboard/classes', ClassController::class);
Route::resource('dashboard/students', StudentController::class)->except(['edit', 'update','distroy']);
Route::get('dashboard/classes/{classId}/students/{studentId}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('dashboard/classes/{classId}/students/{studentId}', [StudentController::class, 'update'])->name('students.update');
Route::delete('dashboard/classes/{classId}/students/{studentId}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('dashboard/subjects', SubjectController::class)->except(['edit', 'update','distroy']);
Route::get('dashboard/classes/{classId}/subjects/{subjectId}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('dashboard/classes/{classId}/subjects/{subjectId}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('dashboard/classes/{classId}/subjects/{subjectId}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
Route::resource('dashboard/staff', StaffController::class);
