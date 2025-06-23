<?php

namespace App\Utils;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class HandleImage
{
  public static function saveImgFromContent(string $directory, string $content, $id) {
    preg_match_all('/data:image\/[a-zA-Z]+;base64,[^"]+/', $content, $matches);
    $base64Images = $matches[0];

    self::deleteDirectory($directory, $id);
    foreach ($base64Images as $key => $img) {
      $fileName = $key . '-' . Carbon::now()->valueOf() . '.png';
      $filePath = "{$directory}/{$id}/{$fileName}";

      Storage::disk('public')->put($filePath, base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $img)));
      $url = Storage::disk('public')->url($filePath);
      $content = str_replace($img, $url, $content);
    }

    return $content;
  }

  public static function deleteDirectory($directory, $id) {
    Storage::disk('public')->deleteDirectory("{$directory}/{$id}");
  }

  public static function saveSingleImg($path, $id, $img) {
    $ext = $img->getClientOriginalExtension();

    $name = $id . '-' . Carbon::now()->valueOf() . ".{$ext}";
    Storage::disk('public')->putFileAs($path, $img, $name);
    return Storage::disk('public')->url("{$path}/{$name}");
  }
}