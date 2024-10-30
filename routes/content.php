<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::middleware('auth')->group(function () {
    /* upload */
    Route::get("/upload", [ContentController::class, "upload"])->name('content.create');;
    Route::post("/upload", [ContentController::class, "store"])->name('content.upload');
});