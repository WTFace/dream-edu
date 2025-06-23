<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Utils\HandleImage;
use Illuminate\Http\Request;

class BannerController extends Controller
{
  public function index() {
    $banners = Banner::filter(request(['type']))->get();
    return inertia()->render('banner/Index', compact('banners'));
  }

  public function store(Request $request) {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $banner = Banner::create(['type' => $request->type]);
    $src = HandleImage::saveSingleImg('banner', $banner->id, $request->file('image'));

    $banner->src = $src;
    $banner->save();

    return to_route('banner');
  }
}
