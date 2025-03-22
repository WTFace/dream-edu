<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
  return Inertia::render('Home');
})->name('home');

Route::get('/social-redirect/{provider}', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/social-callback/{provider}', [SocialController::class, 'callback'])->name('social.callback');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
