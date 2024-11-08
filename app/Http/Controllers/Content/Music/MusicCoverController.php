<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Controllers\Content\Music\MusicController;
use App\Http\Requests\MusicUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MusicCoverController extends Controller
{
    public function update(Request $request, String $id): RedirectResponse
    {
        $track = MusicController::find($id);
        $validated = $request->validate([
            'cover' => 'nullable|image',
        ]);

        if ($validated["cover"]) {
            $validated["cover"] = Storage::putFile("covers", $request->file("cover"));
        }

        $track->fill($validated);

        $track->save();


        dd($validated);
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
