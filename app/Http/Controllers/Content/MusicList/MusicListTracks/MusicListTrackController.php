<?php

namespace App\Http\Controllers\Content\MusicList\MusicListTracks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Music;
use App\Models\MusicList;
use App\Models\MusicListTracks;

class MusicListTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $playlistid, String $trackid)
    {
        $trackList = MusicList::findOrFail($playlistid);
        $track = Music::findOrFail($trackid);

        $trackListItem = new MusicListTracks;

        $trackListItem->music_list_id = $trackList->id;
        $trackListItem->music_id = $track->id;

        $trackListItem->save();
        
        return;
    }

    /**
     * Display the specified resource.
     */
    public function show(MusicListTracks $musicListTracks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MusicListTracks $musicListTracks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MusicListTracks $musicListTracks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MusicListTracks $musicListTracks)
    {
        //
    }
}
