<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\MusicAudioUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;

class MusicAudioController extends Controller
{
    public function update(MusicAudioUpdateRequest $request, String $id): RedirectResponse
    {
        $track = MusicController::find($id);
        $validated = $request->validated();

        if ($track->audio && Storage::exists($track->audio)) {
            Storage::delete($track->audio);
        }

        $validated["audio"] = Storage::putFile("audio", $request->file("audio"));

        $track->fill($validated);
        $track->save();
        
        return Redirect::route('content.music.edit', [
            "id" => $id
        ]);
    }
}
