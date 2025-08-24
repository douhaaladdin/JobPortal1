<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// ✅ Test Route للتأكد إن الملف بيتحمل
Route::get('/check', function () {
    return '✅ Correct web.php is loading';
});

// Home page showing a list of jobs
Route::get('/', [JobController::class, 'index'])->name('jobs.index');

// Public route to view a single job
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Employer routes
    Route::middleware('role:employer')->group(function () {
        Route::get('/employers/my-jobs', [EmployerController::class, 'myJobs'])->name('employers.my-jobs');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    });

    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
