<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Controllers\Content\Music\MusicController;
use App\Http\Requests\MusicUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicCoverController extends Controller
{
    public function update(MusicUpdateRequest $request, String $id): RedirectResponse
    {
        dd($request);
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
