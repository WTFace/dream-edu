<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  protected $guarded = ['id'];

  public function scopeFilter($query, array $filters) {
    $query->when($filters['type'] ?? false, fn($query, $search) => $query->where('type', $search));
  }
}
