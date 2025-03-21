<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
  /**
   * Show the registration page.
   */
  public function create(): Response {
    return Inertia::render('auth/Register');
  }

  /**
   * Handle an incoming registration request.
   *
   * @throws ValidationException
   */
  public function store(Request $request): RedirectResponse {
    $request->validate([
      'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return to_route('dashboard');
  }
}
