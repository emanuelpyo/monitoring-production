<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RejectReason extends Model
{
    protected $fillable = [
        'name',
    ];

    public function productionEvents(): HasMany
    {
        return $this->hasMany(ProductionEvent::class);
    }
}
