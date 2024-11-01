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
    /* display upload */
    public function upload(Request $request): Response
    {
        return Inertia::render('Content/Music/Upload');
    }

    /* upload */
    public function store(Request $request): Response
    {
        /* input validation */
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "cover" => "image"
        ]);
        
        $validated['uploader_id'] = auth()->id();

        $validated["cover"] = $request->file("cover")->store("covers");
        
        $track = Music::create($validated);

        dd($request->all());
        //$validated = $request->validate([
        //    "name" => "required|string|max:255",
        //    "cover" => "required|image|"
        //]);

        //$validated["cover"] = $request->file("cover")->store("covers");
    }
}
