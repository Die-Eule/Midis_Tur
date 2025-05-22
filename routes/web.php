<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('dashboard');
Route::get('/d2', [DirectionController::class, 'index'])->name('dashboard2');
Route::get('/d3/{id}', [DepartmentController::class, 'index'])->name('dashboard3');
Route::get('/d4/{id}', [TeacherController::class, 'index'])->name('dashboard4');
Route::get('/d5/{id}', [ProjectController::class, 'index'])->name('dashboard5');
Route::get('/d6/{id}', [PhotoController::class, 'index'])->name('dashboard6');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/subscription/all', [ProfileController::class, 'subscribeAll'])->name('subscription.full');
    Route::put('/profile/subscription/{id}', [ProfileController::class, 'subscribe'])->name('subscription.add');
    Route::delete('/profile/subscription/{id}', [ProfileController::class, 'unsubscribe'])->name('subscription.delete');

    Route::patch('/d2', [DirectionController::class, 'update'])->name('dashboard2.update');

    Route::patch('/d4', [TeacherController::class, 'update'])->name('dashboard4.update');
    Route::put('/d4/{id}', [TeacherController::class, 'add'])->name('dashboard4.add');
    Route::delete('/d4', [TeacherController::class, 'remove'])->name('dashboard4.remove');

    Route::put('/d6/{id}', [PhotoController::class, 'add'])->name('dashboard6.upload');
    Route::delete('/d6', [PhotoController::class, 'remove'])->name('dashboard6.remove');
});

require __DIR__.'/auth.php';
