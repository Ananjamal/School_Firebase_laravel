<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\ContactController;
use App\Http\Controllers\Firebase\Admin\ClassController;
use App\Http\Controllers\Firebase\Admin\StudentController;
use App\Http\Controllers\Firebase\Admin\SubjectController;
use App\Http\Controllers\Firebase\Admin\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/addUser', [ContactController::class, 'create'])->name('firebase.addUser');
Route::post('/addUser', [ContactController::class, 'store'])->name('firebase.create');
Route::get('/editUser/{id}', [ContactController::class, 'edit'])->name('firebase.editUser');
Route::put('/updateUser/{id}', [ContactController::class, 'update'])->name('firebase.updateUser');
Route::delete('/deleteUser/{id}', [ContactController::class, 'destroy'])->name('firebase.deleteUser');

// Route::post('/firebase', [FirebaseController::class, 'store'])->name('firebase.store');
// Route::delete('/firebase/{id}', [FirebaseController::class, 'destroy'])->name('firebase.destroy');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('dashboard/classes', ClassController::class);
// Use resource routing for the main student routes except for edit and update
Route::resource('dashboard/students', StudentController::class)->except(['edit', 'update','distroy']);
Route::get('dashboard/classes/{classId}/students/{studentId}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('dashboard/classes/{classId}/students/{studentId}', [StudentController::class, 'update'])->name('students.update');
Route::delete('dashboard/classes/{classId}/students/{studentId}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('dashboard/subjects', SubjectController::class)->except(['edit', 'update','distroy']);
Route::get('dashboard/classes/{classId}/subjects/{subjectId}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('dashboard/classes/{classId}/subjects/{subjectId}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('dashboard/classes/{classId}/subjects/{subjectId}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

// Route::resource('dashboard/subjects', SubjectController::class);
// Route::resource('dashboard/staff', StaffController::class);
