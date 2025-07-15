<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Utils\HandleImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
  public function index() {
    TestEvent::dispatch('cashIn');
    $data = Gallery::filter(request(['type']))->paginate(12);
    return inertia()->render('gallery/Index', compact('data'));
  }

  public function create() {
    return inertia()->render('gallery/Create');
  }

  public function update(Request $request, Gallery $gallery) {
    $args = $request->all();
    if ($args['body']) {
      $body = $args['body'];

      $args['body'] = HandleImage::saveImgFromContent('gallery', $body, $gallery->id);
      $args['thumbnail'] = HandleImage::extractFirstImageSrc($args['body']);
    }
    $gallery->update($args);
    return redirect()->back();
  }

  public function store(GalleryRequest $request) {
    $data = $request->validated();
    $body = $data['body'];
    $data['body'] = 'temp';

    $gallery = Gallery::create($data);
    $gallery->body = HandleImage::saveImgFromContent('gallery', $body, $gallery->id);
    $gallery->thumbnail = HandleImage::extractFirstImageSrc($gallery->body);
    $gallery->save();

    return redirect()->route('gallery');
  }

  public function destroy(Gallery $gallery) {
    HandleImage::deleteDirectory('gallery', $gallery->id);
    $gallery->delete();
    return redirect()->back();
  }
}
