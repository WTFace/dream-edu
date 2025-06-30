<?php

namespace App\Utils;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

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

  public static function deleteModelSrc(string $src) {
    $path = str_replace(Storage::disk('public')->url(''), '', $src);
    Storage::disk('public')->delete($path);
  }

  public static function resizeImage($img, $width = 680) {
    // 680 x 458 for gallery
    $maxSize = 512 * 1024;
    $manager = new ImageManager(new Driver());
    $image = $manager->read($img);
    $image->scale(width: $width);

    $quality = 90;
    do {
      $encoded = $image->toJpeg(quality: $quality)->toString();
      $quality -= 5;
    } while (strlen($encoded) >= $maxSize && $quality >= 10);

    return $encoded;
  }

  public static function saveSingleImg($path, $id, $img) {
    $name = $id . '-' . Carbon::now()->valueOf() . ".jpg"; // always save as JPEG

    $encoded = self::resizeImage($img, 680);

    // Save to public disk
    Storage::disk('public')->put("{$path}/{$name}", $encoded);

    return Storage::disk('public')->url("{$path}/{$name}");
  }
}