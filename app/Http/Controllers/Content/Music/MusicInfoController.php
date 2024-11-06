<?php

namespace App\Http\Controllers\Content\Music;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicInfoController extends Controller
{
    public function update(Request $request, String $id): RedirectResponse
    {

        return Redirect::route('content.music.edit', [
            "id" => $id
        ]);
    }
}
