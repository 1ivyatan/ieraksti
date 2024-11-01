<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Music;

class MusicController extends Controller
{
    /* display track */
    public function show(String $id): Response
    {
        $music = Music::findOrFail($id);
        //dd($music);
        return Inertia::render('Content/Music/Show', [
            "music" => $music
        ]);
    }

    /* display upload */
    public function create(Request $request): Response
    {
        return Inertia::render('Content/Music/Create');
    }

    /* upload */
    public function store(Request $request): Response
    {
        /* input validation */
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "cover" => "image"
        ]);

        $validated["cover"] = $request->file("cover")->store("covers");
        
        auth()->user()->music()->create($validated);
        dd($request->all());
    }
}
