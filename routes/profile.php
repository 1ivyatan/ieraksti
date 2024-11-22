<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Profile\ProfileContentController;


/* logged in */
Route::middleware('auth')->group(function () {
    /* profile */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("user-track-list-show/{id}", [ProfileContentController::class, "musicTracksFromProfile"])->name('user.musiclist.show');
});