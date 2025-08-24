<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page route which will now return the 'jobs.index' page.
Route::get('/', [JobController::class, 'index'])->name('jobs.index');

// Public route to view a single job
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Group of routes that require user authentication
Route::middleware(['auth'])->group(function () {
    // Employer-specific routes
    Route::middleware('role:employer')->group(function () {
        Route::get('/employers/my-jobs', [EmployerController::class, 'myJobs'])->name('employers.my-jobs');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    });

    // Admin-specific routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // General user profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/dashboard', function () {
    return view('dashboard'); // اعملي ملف resources/views/dashboard.blade.php
})->name('dashboard');
