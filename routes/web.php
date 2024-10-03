<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TaskController;
use App\Livewire\Counter;
use App\Livewire\Schedules\Forms\BaseSchedule;
use Illuminate\Support\Carbon;

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

// Authentication routes
Auth::routes();

// Protected routes requiring authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Staff resource routes
    Route::resource('staffs', StaffController::class);

    // Work resource routes
    Route::resource('works', WorkController::class);

    // Schedule resource routes
    Route::resource('schedule', ScheduleController::class);

    // Task routes
    Route::post('/store-task-details', [TaskController::class, 'storeTaskDetails'])->name('storeTaskDetail');
    Route::get('/calculate-weeks/{month}', [TaskController::class, 'calculateWeeks'])->name('calculateWeeks');

    // Plan route
    Route::get('/plan', [HomeController::class, 'plan'])->name('plan');

    // Schedule related route
    Route::resource('schedule', ScheduleController::class);
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/listschedule', [ScheduleController::class, 'list'])->name('schedule.list');
    Route::get('/templateschedule', [ScheduleController::class, 'template'])->name('schedule.template');
    Route::get('/download-pdf', [ScheduleController::class, 'generatePdf'])->name('generate.pdf');
    // Route::get('/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');

    // Livewire route
    Route::get('/counter', Counter::class);
    Route::get('/base', BaseSchedule::class); 
    Route::get('/test', [ScheduleController::class, 'test'])->name('schedule.test');
    
});
