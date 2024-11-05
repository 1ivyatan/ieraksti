<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Controllers\Controller;
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
    private function find(String $id) {
        $track = Music::findOrFail($id);

        return $track;
    }

    public function show(Request $request, String $id): Response
    {
        $track = $this->find($id);

        if ($track->cover) {
            $track->cover = Storage::url($music->cover);
        } else {
            $track->cover = Config::get("styling.coverimage");
        }

        return Inertia::render('Content/Music/Show/Show', [
            "music" => $track
        ]);
    }

    public function create(Request $request): Response
    {
        return Inertia::render('Content/Music/Create/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "cover" => "nullable|image"
        ]);

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
        $track = Music::findOrFail($id);

        if ($track->cover) {
            $track->cover = Storage::delete($music->cover);
        }

        $track->delete();

        return Redirect::route("home");
    }
}
