<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use SocialiteProviders\Kakao\KakaoProvider;
use SocialiteProviders\Kakao\Provider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void {
    Password::defaults(function () {
      return Password::min(4)->max(13);
    });

    Event::listen(function (SocialiteWasCalled $event) {
      $event->extendSocialite('naver', \SocialiteProviders\Naver\Provider::class);
    });

    Event::listen(function (SocialiteWasCalled $event) {
      $event->extendSocialite('kakao', KakaoProvider::class);
    });

  }
}
