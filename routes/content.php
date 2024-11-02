<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\MusicController;

/* -- guests */
/* music */
Route::get("/track/{id}", [MusicController::class, "show"])->name('content.music.show');

/* -- only authorized */
Route::middleware('auth')->group(function () {
    /* music */

    Route::get("/upload", [MusicController::class, "create"])->name('content.music.create');
    Route::get("/track/{id}/edit", [MusicController::class, "edit"])->name('content.music.edit');
    Route::post("/upload", [MusicController::class, "store"])->name('content.music.upload');
});