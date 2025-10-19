<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Resource routes
    Route::resource('students', StudentController::class)->names('admin.students');
    Route::resource('teachers', TeacherController::class)->names('admin.teachers');
    Route::resource('classes', ClassController::class)->names('admin.classes');
    Route::resource('subjects', SubjectController::class)->names('admin.subjects');
    Route::resource('attendance', AttendanceController::class)->names('admin.attendance');
    
    // Reports
    Route::get('reports', [ReportController::class, 'index'])->name('admin.reports.index');
    Route::post('reports/generate', [ReportController::class, 'generate'])->name('admin.reports.generate');
});