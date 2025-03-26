<?php

use App\Models\Activity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;


// Route to the homepage
Route::get('/', function () {
    return view('welcome'); // Ensure this points to 'welcome.blade.php'
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure dashboard.blade.php exists
})->middleware(['auth'])->name('dashboard');

// Auth routes (register, login, etc.)
Auth::routes();

// Route for home page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Route for activities using ActivityController
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');

// Report generation route
Route::get('/activities/report', [ActivityController::class, 'generateReport'])->name('activities.generateReport');

Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');

// Route to store a new activity
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');

Route::get('/daily-activities', [ActivityController::class, 'dailyActivities'])->name('activities.daily');

Route::get('/activities/search', [ActivityController::class, 'search'])->name('activities.search');

Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');

Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');

Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');

});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
