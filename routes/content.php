<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\Music\MusicController;
use App\Http\Controllers\Content\Music\MusicInfoController;
use App\Http\Controllers\Content\Music\MusicCoverController;

Route::get("/track/{id}", [MusicController::class, "show"])->name('content.music.show');

Route::middleware('auth')->group(function () {
    
});

Route::middleware(["auth", "privileged"])->group(function () {
    Route::get("/upload", [MusicController::class, "create"])->name('content.music.create');
    Route::post("/upload", [MusicController::class, "store"])->name('content.music.upload');

    Route::delete("/track/{id}", [MusicController::class, "destroy"])->name('content.music.destroy');
    Route::get("/track/{id}/edit", [MusicController::class, "edit"])->name('content.music.edit');
    Route::put("track-info-edit/{id}", [MusicInfoController::class, "update"])->name('content.music.info.update');
    Route::put("track-cover-edit/{id}", [MusicCoverController::class, "update"])->name("content.music.cover.update");
});