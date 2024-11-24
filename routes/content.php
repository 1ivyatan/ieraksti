<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Content\Music\MusicController;
use App\Http\Controllers\Content\Music\MusicInfoController;
use App\Http\Controllers\Content\Music\MusicCoverController;
use App\Http\Controllers\Content\Music\MusicAudioController;

use App\Http\Controllers\Content\MusicList\MusicListController;
use App\Http\Controllers\Content\MusicList\MusicListTracks\MusicListTrackController;

Route::get("/tracks", [MusicController::class, "index"])->name('content.music.index');
Route::get("/track/{id}", [MusicController::class, "show"])->name('content.music.show');
Route::get("/lists/{id}", [MusicListController::class, "show"])->name('content.musiclist.show');

Route::middleware(["auth", "privileged"])->group(function () {
    /* music */
    Route::get("/upload", [MusicController::class, "create"])->name('content.music.create');
    Route::post("/upload", [MusicController::class, "store"])->name('content.music.upload');

    Route::delete("/track/{id}", [MusicController::class, "destroy"])->name('content.music.destroy');
    Route::get("/track/{id}/edit", [MusicController::class, "edit"])->name('content.music.edit');
    Route::put("track-info-update/{id}", [MusicInfoController::class, "update"])->name('content.music.info.update');
    
    Route::post("track-cover-update/{id}", [MusicCoverController::class, "update"])->name("content.music.cover.update");
    Route::post("track-audio-update/{id}", [MusicAudioController::class, "update"])->name("content.music.audio.update");
    Route::delete("track-cover-destroy/{id}", [MusicCoverController::class, "destroy"])->name("content.music.cover.destroy");

    /* playlists */
    Route::get("/lists/create", [MusicListController::class, "create"])->name('content.musiclist.create');
    Route::post("/lists/create", [MusicListController::class, "store"])->name('content.musiclist.upload');
    
    Route::get("/lists/{id}/edit", [MusicListController::class, "edit"])->name('content.musiclist.edit');
    
    Route::get("user-track-list-show/{playlistid}", [MusicListController::class, "show"])->name('content.musiclist.tracks.show');

    Route::post("track-list-store/{playlistid}/{trackid}", [MusicListTrackController::class, "store"])->name('content.musiclist.tracks.add');
});