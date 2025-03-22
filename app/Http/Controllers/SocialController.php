<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
  public function redirect(string $provider) {
    return Socialite::driver($provider)->redirect();
  }

  public function callback(string $provider) {
    $socialUser = Socialite::driver($provider)->user();
    $user = User::where('email', $socialUser->email)->first();

    if (!$user) {
      $user = User::create(['email' => $socialUser->email, 'phone' => $socialUser->phone]);
    }
    Auth::login($user);

    return redirect()->route('home');
  }
}
