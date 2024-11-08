<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\MusicUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Music;

class MusicController extends Controller
{
    public static function find(String $id) {
        $track = Music::findOrFail($id);

        return $track;
    }

    public function show(Request $request, String $id): Response
    {
        $track = $this->find($id);

        if ($track->cover) {
            $track->cover = Storage::url($track->cover);
        }

        return Inertia::render('Content/Music/Show/Show', [
            "music" => $track
        ]);
    }

    public function create(Request $request): Response
    {
        return Inertia::render('Content/Music/Create/Create');
    }

    public function edit(Request $request, String $id): Response
    {
        $track = $this->find($id);

        if ($track->cover) {
            $track->cover = Storage::url($track->cover);
        }

        return Inertia::render('Content/Music/Edit/Edit', [
            "music" => $track
        ]);
    }

    public function store(MusicUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($validated["cover"]) {
            $validated["cover"] = Storage::putFile("covers", $request->file("cover"));
        }
        
        $track = auth()->user()->music()->create($validated);

        return Redirect::route("content.music.show", [
            "id" => $track->id
        ]);
    }

    public function destroy(Request $request, String $id): RedirectResponse
    {
        $track = $this->find($id);

        if ($track->cover) {
            $track->cover = Storage::delete($track->cover);
        }

        $track->delete();

        return Redirect::route("home");
    }
}
