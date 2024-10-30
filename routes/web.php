<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContentController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::middleware('auth')->group(function () {
    /* profile */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* upload */
    Route::get("/upload", [ContentController::class, "upload"])->name("content.upload");
});

require __DIR__.'/auth.php';
