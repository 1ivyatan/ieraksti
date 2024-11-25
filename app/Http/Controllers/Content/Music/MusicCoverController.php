<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Controllers\Content\Music\MusicController;
use App\Http\Requests\Content\MusicCoverUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Music;

class MusicCoverController extends Controller
{
    public function update(MusicCoverUpdateRequest $request, String $id): RedirectResponse
    {
        $track = Music::findOrFail($id);
        $validated = $request->validated();

        if ($track->cover && Storage::exists($track->cover)) {
            Storage::delete($track->cover);
        }

        $validated["cover"] = Storage::putFile("covers", $request->file("cover"));

        $track->fill($validated);
        $track->save();
        
        return Redirect::route('content.music.edit', [
            "id" => $id
        ]);
    }

    public function destroy(Request $request, String $id): RedirectResponse
    {
        $track = MusicController::find($id);

        if (Storage::exists($track->cover)) {
            $track->cover = Storage::delete($track->cover);
            $track->fill(["cover" => null])->save();
        }

        return Redirect::route('content.music.edit', [
            "id" => $id
        ]);
    }
}
