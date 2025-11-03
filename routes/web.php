<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityUpdateController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActivitiesController;



Route::get('/', function () {
    return view('app');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ActivityController::class, 'index'])->name('activities.index');
    Route::resource('activities', ActivityController::class)->only(['index','create','store','show']);
    Route::post('activities/{activity}/updates', [ActivityUpdateController::class, 'store'])->name('activities.updates.store');
    Route::get('reports/history', [ReportController::class, 'history'])->name('reports.history');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('activities', \App\Http\Controllers\ActivityController::class);
    Route::resource('activity_updates', \App\Http\Controllers\ActivityUpdateController::class);
});


Route::get('/activity-updates', [ActivityUpdateController::class, 'index'])->name('activity_updates.index');
Route::post('/activity/{activity}/update', [ActivityUpdateController::class, 'store'])->name('activity_updates.store');


Route::resource('activities', ActivitiesController::class);

Route::get('/activity-updates', [ActivityUpdateController::class, 'index'])->name('activity_updates.index');
Route::post('/activity/{activity}/update', [ActivityUpdateController::class, 'store'])->name('activity_updates.store');

use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
