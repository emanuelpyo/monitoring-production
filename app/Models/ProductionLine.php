<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductionLine extends Model
{
    protected $fillable = [
        'name',
        'code',
        'status',
        'current_product_id',
        'last_activity_at',
    ];

    protected function casts(): array
    {
        return [
            'last_activity_at' => 'datetime',
        ];
    }

    public function currentProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'current_product_id');
    }

    public function productionEvents(): HasMany
    {
        return $this->hasMany(ProductionEvent::class, 'line_id');
    }
}
