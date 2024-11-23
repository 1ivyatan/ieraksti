<?php

namespace App\Http\Controllers\Profile;

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
use App\Models\User;

class ProfileContentController extends Controller
{
    public function musicTracksFromProfile(Request $request) {
        $tracks = $request->user()->musicList()->get();

        return $tracks;
    }
}
