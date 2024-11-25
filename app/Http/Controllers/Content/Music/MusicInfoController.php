<?php

namespace App\Http\Controllers\Content\Music;

use App\Http\Requests\Content\MusicInfoUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Music;

class MusicInfoController extends Controller
{
    public function update(MusicInfoUpdateRequest $request, String $id): RedirectResponse
    {
        $track = Music::findOrFail($id);

        $track->fill($request->validated());

        $track->save();

        return Redirect::route('content.music.edit', [
            "id" => $id
        ]);
    }
}
