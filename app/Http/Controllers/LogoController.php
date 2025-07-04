<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Utils\HandleImage;
use Illuminate\Http\Request;

class LogoController extends Controller
{
  public function index() {
    return inertia()->render('logo/Index', []);
  }

  public function store(Request $request) {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ]);

    $banner = Banner::firstOrCreate([
      'type' => 'logo'
    ]);

    $src = HandleImage::saveSingleImg('banner', $banner->id, $request->file('image'));

    $banner->src = $src;
    $banner->save();

    return redirect()->back();
  }
}
