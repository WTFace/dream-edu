<?php

namespace App\Utils;

use App\Models\Banner;

class BannerQuery
{
  public static function culture() {
    return Banner::where('type', 'culture')->get();
  }

  public static function silverClass() {
    return Banner::where('type', 'silverClass')->get();
  }
}