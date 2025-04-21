<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/d2', function () {
    return view('dashboard2');
})->name('dashboard2');
Route::get('/d3', function () {
    return view('dashboard3');
})->name('dashboard3');
Route::get('/d4', function () {
    return view('dashboard4');
})->name('dashboard4');
Route::get('/d5', function () {
    return view('dashboard5');
})->name('dashboard5');
Route::get('/d6', function () {
    return view('dashboard6');
})->name('dashboard6');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
