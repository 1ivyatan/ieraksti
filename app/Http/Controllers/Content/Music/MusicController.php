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
use App\Enums\UserType;

class MusicController extends Controller
{
    public function show(Request $request, String $id): Response
    {
        return Inertia::render('Content/Music/Show/Show');
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
}
