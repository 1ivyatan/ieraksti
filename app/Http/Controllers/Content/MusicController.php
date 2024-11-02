<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Music;

class MusicController extends Controller
{
    /* get track */
    private function getMusic(String $id) {
        $music = Music::findOrFail($id);

        if ($music->cover) {
            $music->cover = Storage::url($music->cover);
        } else {
            $music->cover = "/assets/track.png";
        }
        
        return $music;
    }

    /* display track */
    public function show(String $id): Response
    {
        $music = $this->getMusic($id);

        return Inertia::render('Content/Music/Show/Show', [
            "music" => $music
        ]);
    }

    /* display upload */
    public function create(Request $request): Response
    {
        return Inertia::render('Content/Music/Create/Create');
    }

    /* display edit */
    public function edit(Request $request, String $id): Response
    {
        $music = $this->getMusic($id);

        return Inertia::render('Content/Music/Create/Create', [
            "music" => $music
        ]);
    }

    /* upload */
    public function store(Request $request): Response
    {

        /* input validation */
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "cover" => "nullable|image"
        ]);

        /* storing */
        if ($validated["cover"]) {
            $validated["cover"] = Storage::putFile("covers", $request->file("cover"));
        }
        
        auth()->user()->music()->create($validated);

        dd($validated);
    }
}
