<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Controllers\Content\Music\MusicController;
use App\Http\Requests\MusicUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicInfoController extends Controller
{
    public function update(MusicUpdateRequest $request, String $id): RedirectResponse
    {
        $track = MusicController::find($id);

        dd($request);

        return Redirect::route('content.music.edit', [
            "id" => $id
        ]);
    }
}
