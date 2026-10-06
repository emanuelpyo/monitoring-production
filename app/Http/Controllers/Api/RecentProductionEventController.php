<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductionEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecentProductionEventController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $limit = min(
            max((int) $request->input('limit', 50), 1),
            100
        );

        $events = ProductionEvent::with([
            'line',
            'product',
            'rejectReason',
        ])
            ->orderByDesc('event_at')
            ->limit($limit)
            ->get();

        return response()->json([
            'data' => $events,
        ]);
    }
}
