<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->prefix('/timetable')->name('timetable.')->group(function () {
    Route::get('/lecture', function () {
        return Inertia::render('Time_Table/Lecture_Time_Table/Index');
    })->name('lecture');
    Route::get('/exams', function () {
        return Inertia::render('Time_Table/Exam_Time_Table/Index');
    })->name('exams');
    Route::get('/schedule_exams', function () {
        return Inertia::render('Time_Table/Exam_Time_Table/Schedule');
    })->name('schedule_exams');
    
});

Route::middleware('auth')->prefix('/manage_location')->name('manage_location.')->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('manage_location');
    // Route::POST('/create_location', [LocationController::class, 'Create'])->name('create_location');
    Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
});

Route::middleware('auth')->prefix('/emergency_broadcast')->name('emergency_broadcast.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Emergency_broadcast/Index');
    })->name('emergency_broadcast');
});

Route::middleware('auth')->prefix('/notifi_cation')->name('notifi_cation.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Notifi_cation/Index');
    })->name('notifi_cation');
});

Route::middleware('auth')->prefix('/my_timetable')->name('my_timetable.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('My_timetable/Index');
    })->name('my_timetable');
});

// Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
// Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
// Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
// Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('locations.edit');
// Route::put('/locations/{location}', [LocationController::class, 'update'])->name('locations.update');
// Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');

// Route::get('/locations/{location}/allocate', [LocationController::class, 'allocateForm'])->name('locations.allocateForm');
// Route::post('/locations/{location}/allocate', [LocationController::class, 'allocate'])->name('locations.allocate');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
