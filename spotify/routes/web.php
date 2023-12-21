<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\SpotifyController;

Route::get('/spotify/login', [SpotifyController::class, 'login'])->name('spotify.login');
Route::get('/spotify/callback', [SpotifyController::class, 'handleCallback'])->name('spotify.callback');
Route::get('/spotify/profile', [SpotifyController::class, 'profile'])->name('spotify.profile');




Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
require __DIR__.'/auth.php';


