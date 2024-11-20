<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

require __DIR__.'/auth.php';
require __DIR__.'/content.php';
require __DIR__.'/profile.php';
