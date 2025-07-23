<?php

namespace App\Models;

use App\Models\Scopes\DefaultOrder;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([DefaultOrder::class])]
class Article extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];
}
