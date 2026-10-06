<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductionLine;
use App\Models\RejectReason;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Product A',
                'code' => 'PRD-A',
                'material' => 'Material A',
                'route' => 'Route 1',
            ],
            [
                'name' => 'Product B',
                'code' => 'PRD-B',
                'material' => 'Material B',
                'route' => 'Route 2',
            ],
            [
                'name' => 'Product C',
                'code' => 'PRD-C',
                'material' => 'Material C',
                'route' => 'Route 3',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $productA = Product::where('code', 'PRD-A')->first();
        $productB = Product::where('code', 'PRD-B')->first();
        $productC = Product::where('code', 'PRD-C')->first();

        ProductionLine::create([
            'name' => 'Production Line 01',
            'code' => 'LINE-01',
            'status' => 'RUNNING',
            'current_product_id' => $productA->id,
            'last_activity_at' => now(),
        ]);

        ProductionLine::create([
            'name' => 'Production Line 02',
            'code' => 'LINE-02',
            'status' => 'WARNING',
            'current_product_id' => $productB->id,
            'last_activity_at' => now(),
        ]);

        ProductionLine::create([
            'name' => 'Production Line 03',
            'code' => 'LINE-03',
            'status' => 'STOPPED',
            'current_product_id' => $productC->id,
            'last_activity_at' => null,
        ]);

        RejectReason::create(['name' => 'Defect']);
        RejectReason::create(['name' => 'Dimension Error']);
        RejectReason::create(['name' => 'Material Error']);
        RejectReason::create(['name' => 'Machine Error']);
    }
}
