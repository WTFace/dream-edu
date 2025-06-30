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
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ]);
    $banner = Banner::create(['type' => $request->type]);
    $src = HandleImage::saveSingleImg('banner', $banner->id, $request->file('image'));

    $banner->src = $src;
    $banner->save();

    return to_route('banner');
  }

  public function update(Request $request, Banner $banner) {
    $request->validate([
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $args = $request->all();

    if ($args['image']) {
      HandleImage::deleteModelSrc($banner->src);

      $banner->src = HandleImage::saveSingleImg('banner', $banner->id, $args['image']);
      $banner->save();
    }

    unset($args['image']);
    $banner->update($args);
    return redirect()->back();
  }

  public function destroy(Banner $banner) {
    HandleImage::deleteModelSrc($banner->src);
    $banner->delete();
    return redirect()->back();
  }
}
