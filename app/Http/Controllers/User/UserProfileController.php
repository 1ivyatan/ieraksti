<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\MusicList;

class UserProfileController extends Controller
{
    public function musicTracks(Request $request, String $id) {
        $tracks = //MusicList::findOrFail($id)->musicListTracks();
        
        dd($tracks);

        return $tracks;
    }
}
