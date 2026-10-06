<?php

namespace App\Services;

use App\Models\ProductionEvent;
use App\Models\ProductionLine;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductionService
{
    public function recordEvent(array $data): ProductionEvent
    {
        return DB::transaction(function () use ($data) {
            $line = ProductionLine::where('code', $data['line'])->firstOrFail();
            $product = Product::where('code', $data['product'])->firstOrFail();

            $event = ProductionEvent::create([
                'line_id' => $line->id,
                'product_id' => $product->id,
                'status' => $data['status'],
                'reject_reason_id' => $data['reject_reason_id'] ?? null,
                'event_at' => $data['event_at'],
                'created_at' => now(),
            ]);

            $line->update([
                'current_product_id' => $product->id,
                'last_activity_at' => $data['event_at'],
            ]);

            return $event->load([
                'line',
                'product',
                'rejectReason',
            ]);
        });
    }
}
