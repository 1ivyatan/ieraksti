<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\MusicController;

Route::middleware('auth')->group(function () {
    /* upload music*/
    Route::get("/upload", [MusicController::class, "upload"])->name('content.create');;
    Route::post("/upload", [MusicController::class, "store"])->name('content.upload');
});