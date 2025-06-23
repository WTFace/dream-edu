<?php

namespace App\Http\Controllers;

use App\Models\Banner;

class SilverController extends Controller
{
  public function index() {
    $banners = Banner::where('type', 'silverClass')->get();
    return inertia('Silver', compact('banners'));
  }
}
