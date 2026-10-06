<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'code',
        'material',
        'route',
    ];

    public function productionLines(): HasMany
    {
        return $this->hasMany(ProductionLine::class, 'current_product_id');
    }

    public function productionEvents(): HasMany
    {
        return $this->hasMany(ProductionEvent::class);
    }
}
