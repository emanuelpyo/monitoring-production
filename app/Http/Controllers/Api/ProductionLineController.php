<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductionLine;
use Illuminate\Http\JsonResponse;

class ProductionLineController extends Controller
{
    public function index(): JsonResponse
    {
        $lines = ProductionLine::with('currentProduct')
            ->orderBy('code')
            ->get();

        return response()->json([
            'data' => $lines,
        ]);
    }
}
