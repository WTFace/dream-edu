<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SocialController;
use App\Utils\BannerQuery;
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
  Route::get('culture', fn() => Inertia::render('education/Culture', ['banners' => BannerQuery::culture()]))->name('culture');
  Route::get('mind', fn() => Inertia::render('education/Mind'))->name('mind');
  Route::get('book', fn() => Inertia::render('education/Book'))->name('book');
});

Route::group(['prefix' => 'donation'], function () {
  Route::get('guide', fn() => Inertia::render('donation/Guide'));
  Route::get('faq', fn() => Inertia::render('donation/Faq'));
});

Route::get('silver', fn() => Inertia::render('Silver', ['banners' => BannerQuery::silverClass()]))->name('silverClass');

Route::group(['prefix' => 'footprint'], function () {
  Route::get('gallery', [GalleryController::class, 'index'])->name('gallery');


  Route::get('article', [ArticleController::class, 'index'])->name('article');
  Route::get('note', fn() => Inertia::render('note/Index'));
});

Route::group(['middleware' => 'auth', 'prefix' => 'article', 'controller' => ArticleController::class], function () {
  Route::get('create', 'create')->name('article.create');
  Route::post('', 'store')->name('article.store');
  Route::patch('{article}', 'update')->name('article.update');
  Route::delete('{article}', 'destroy')->name('article.destroy');
});

Route::group(['middleware' => 'auth', 'controller' => GalleryController::class], function () {
  Route::get('gallery/create', 'create')->name('gallery.create');
  Route::post('gallery', 'store')->name('gallery.store');
  Route::patch('gallery/{gallery}', 'update')->name('gallery.update');
  Route::delete('gallery/{gallery}', 'destroy')->name('gallery.destroy');
});

Route::group(['prefix' => 'banner', 'middleware' => 'auth', 'controller' => BannerController::class], function () {
  Route::get('/', 'index')->name('banner');
  Route::post('/', 'store')->name('banner.store');
  Route::patch('{banner}', 'update')->name('banner.update');
  Route::delete('{banner}', 'destroy')->name('banner.destroy');
});

Route::get('logo', [LogoController::class, 'index'])->name('logo');
Route::post('logo', [LogoController::class, 'store'])->name('logo.store');


Route::get('/social-redirect/{provider}', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/social-callback/{provider}', [SocialController::class, 'callback'])->name('social.callback');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
