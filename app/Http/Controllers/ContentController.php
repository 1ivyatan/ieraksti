<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ContentController extends Controller
{
    /* display upload */
    public function upload(Request $request): Response
    {
        return Inertia::render('ContentManager/Upload');
    }
}
