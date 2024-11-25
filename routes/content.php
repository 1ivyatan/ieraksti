<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Content\Music\MusicController;
use App\Http\Controllers\Content\Music\MusicInfoController;
use App\Http\Controllers\Content\Music\MusicCoverController;
use App\Http\Controllers\Content\Music\MusicAudioController;

use App\Http\Controllers\Content\MusicList\MusicListController;
use App\Http\Controllers\Content\MusicList\MusicListTracks\MusicListTrackController;

/* everyone */
    /* music */
    Route::get("/music", [MusicController::class, "index"])->name('content.music.index');
    Route::get("/music/{id}", [MusicController::class, "show"])->name('content.music.show');
    Route::get("music.get/{id}", [MusicController::class, "get"])->name('content.music.retrieve');

    /* musiclist */
    Route::get("/musiclists", [MusicListController::class, "index"])->name('content.musiclist.index');
    Route::get("/musiclists/{id}", [MusicListController::class, "show"])->name('content.musiclist.show');

Route::middleware(["auth", "privileged"])->group(
    function() {
        /* music */
        Route::get("/upload", [MusicController::class, "create"])->name('content.music.create');
        Route::post("/upload", [MusicController::class, "store"])->name('content.music.upload');
        Route::delete("/music/{id}", [MusicController::class, "destroy"])->name('content.music.destroy');
        Route::put("/music/{id}", [MusicInfoController::class, "update"])->name('content.music.info.update');
        Route::get("music.info.update/{id}", [MusicController::class, "edit"])->name('content.music.edit');
        Route::post("music.cover.update/{id}", [MusicCoverController::class, "update"])->name("content.music.cover.update");
        Route::delete("music.cover.destroy/{id}", [MusicCoverController::class, "destroy"])->name("content.music.cover.destroy");
        Route::post("music.audio.update/{id}", [MusicAudioController::class, "update"])->name("content.music.audio.update");

        /* musiclist */
        Route::get("/createlist", [MusicListController::class, "create"])->name('content.musiclist.create');
        Route::post("/createlist", [MusicListController::class, "store"])->name('content.musiclist.upload');
        Route::get("/musiclists/{id}/edit", [MusicListController::class, "edit"])->name('content.musiclist.edit');

        Route::post("musiclist.listtracks.store/{playlistid}/{trackid}", [MusicListTrackController::class, "store"])->name('content.musiclist.music.add');
    }
);