<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\MusicController;

Route::middleware('auth')->group(function () {
    /* music */
    Route::get("/track/{id}", [MusicController::class, "show"])->name('content.music.show');;
    Route::get("/upload", [MusicController::class, "create"])->name('content.music.create');;
    Route::post("/upload", [MusicController::class, "store"])->name('content.music.upload');
});