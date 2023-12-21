<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

// routes/web.php

use App\Http\Controllers\SpotifyController;

Route::get('/spotify/login', [SpotifyController::class, 'login'])->name('spotify.login');
Route::get('/spotify/callback', [SpotifyController::class, 'handleCallback'])->name('spotify.callback');
Route::get('/spotify/profile', [SpotifyController::class, 'profile'])->name('spotify.profile');

// Corrected route name: 'spotify.topView'
Route::view('/spotify/topview', 'topview')->name('spotify.topView');

Route::view('/spotify/graphic', 'spotifygraphic')->name('spotify.graphic');

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';




