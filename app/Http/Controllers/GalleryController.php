<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Utils\HandleImage;

class GalleryController extends Controller
{
  public function index() {
    $data = Gallery::filter(request(['type']))->paginate(12);
    return inertia()->render('gallery/Index', compact('data'));
  }

  public function create() {
    return inertia()->render('gallery/Create');
  }

  public function store(GalleryRequest $request) {
    $data = $request->validated();
    $content = $data['body'];
    $data['body'] = 'temp';

    $gallery = Gallery::create($data);
    $gallery->body = HandleImage::saveImgFromContent('gallery', $content, $gallery->id);
    $gallery->save();

    return redirect()->route('gallery.Index');
  }
}
