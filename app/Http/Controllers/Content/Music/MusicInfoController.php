<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Controllers\Content\Music\MusicController;
use App\Http\Requests\Content\MusicInfoUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicInfoController extends Controller
{
    public function update(MusicInfoUpdateRequest $request, String $id): RedirectResponse
    {
        $track = MusicController::find($id);

        $track->fill($request->validated());

        $track->save();

        return Redirect::route('content.music.edit', [
            "id" => $id
        ]);
    }
}
