<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/d2', [DirectionController::class, 'index'])->name('dashboard2');
Route::get('/d3/{id}', [DepartmentController::class, 'index'])->name('dashboard3');
Route::get('/d4/{id}', [TeacherController::class, 'index'])->name('dashboard4');
Route::get('/d5', function () {
    return view('dashboard5');
})->name('dashboard5');
Route::get('/d6/{id}', [PhotoController::class, 'index'])->name('dashboard6');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
