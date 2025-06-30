<?php

namespace App\Models;

use App\Models\Scopes\DefaultOrder;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([DefaultOrder::class])]
class Gallery extends Model
{
  protected $guarded = ['id'];


  public function scopeFilter($query, array $filters) {
    $query->when($filters['type'] ?? false, fn($query, $search) => $query->where('type', $search));
  }

  protected function casts(): array {
    return [
      'created_at' => 'datetime:Y-m-d',
    ];
  }
}
