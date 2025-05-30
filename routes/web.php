<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
  return Inertia::render('Home');
})->name('home');
Route::get('/intro', fn() => Inertia::render('Intro'))->name('intro');

Route::group(['prefix' => 'support'], function () {
  Route::get('pwd', fn() => Inertia::render('support/Pwd'))->name('pwd');
  Route::get('senior', fn() => Inertia::render('support/Senior'))->name('senior');
  Route::get('overseas', fn() => Inertia::render('support/Overseas'))->name('overseas');
  Route::get('safety', fn() => Inertia::render('support/Safety'))->name('safety');
});

Route::group(['prefix' => 'education'], function () {
  Route::get('youth', fn() => Inertia::render('education/Youth'))->name('youth');
  Route::get('culture', fn() => Inertia::render('education/Culture'))->name('culture');
  Route::get('mind', fn() => Inertia::render('education/Mind'))->name('mind');
  Route::get('book', fn() => Inertia::render('education/Book'))->name('book');
});

Route::group(['prefix' => 'donation'], function () {
  Route::get('guide', fn() => Inertia::render('donation/Guide'));
  Route::get('faq', fn() => Inertia::render('donation/Faq'));
});

Route::get('silver', fn() => Inertia::render('Silver'));

Route::get('/social-redirect/{provider}', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/social-callback/{provider}', [SocialController::class, 'callback'])->name('social.callback');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
