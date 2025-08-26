<?php
/**
 * File name: instructor.php
 * Last modified: 12/07/21, 5:02 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

use App\Http\Controllers\Instructor\DashboardController;
use App\Http\Controllers\AuthConroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->prefix('instructor')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('instructor_dashboard');
    Route::get('/profile', [AuthConroller::class, 'profile'])->name('instructor-profile');
});
