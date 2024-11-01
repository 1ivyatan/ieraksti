<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;

Route::middleware('auth')->group(function () {
    /* upload */
    Route::get("/upload", [MusicController::class, "upload"])->name('content.create');;
    Route::post("/upload", [MusicController::class, "store"])->name('content.upload');
});