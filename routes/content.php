<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\Music\MusicController;

Route::get("/track/{id}", [MusicController::class, "show"])->name('content.music.show');

Route::middleware('auth')->group(function () {

    //Route::get("/track/{id}/edit", [MusicController::class, "edit"])->name('content.music.edit');
    //Route::put("/track/{id}", [MusicController::class, "update"])->name('content.music.update');
});

Route::middleware(["auth", "unbanned"])->group(function () {
    Route::get("/upload", [MusicController::class, "create"])->name('content.music.create');
    Route::post("/upload", [MusicController::class, "store"])->name('content.music.upload');

    Route::delete("/track/{id}", [MusicController::class, "destroy"])->name('content.music.destroy');
});