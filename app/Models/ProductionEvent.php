<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionEvent extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'line_id',
        'product_id',
        'status',
        'reject_reason_id',
        'event_at',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'event_at' => 'datetime',
            'created_at' => 'datetime',
        ];
    }

    public function line(): BelongsTo
    {
        return $this->belongsTo(ProductionLine::class, 'line_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function rejectReason(): BelongsTo
    {
        return $this->belongsTo(RejectReason::class);
    }
}
