<?php

namespace App\Http\Controllers\Content\MusicList;

use App\Http\Controllers\Controller;
use App\Models\MusicList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\Content\MusicListRequest;

use Inertia\Inertia;
use Inertia\Response;

class MusicListController extends Controller
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
    public function create(): Response
    {
        return Inertia::render('Content/MusicList/Create/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MusicListRequest $request)
    {
        $validated = $request->validated();

        $trackList = auth()->user()->musicList()->create($validated);

        return Redirect::route("content.musiclist.show", [
            "id" => $trackList->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MusicList $musicList, String $id)
    {
        $trackList = MusicList::findOrFail($id);

        $tracks = $trackList->musicListTracks();

        dd($tracks);

        return Inertia::render('Content/MusicList/Show/Show', [
            "musicList" => $trackList
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MusicList $musicList, String $id)
    {
        $trackList = MusicList::findOrFail($id);

        return Inertia::render('Content/MusicList/Edit/Edit', [
            "musicList" => $trackList
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MusicList $musicList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MusicList $musicList)
    {
        //
    }
}
