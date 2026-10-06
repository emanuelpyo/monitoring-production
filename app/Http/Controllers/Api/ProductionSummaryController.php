<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductionEvent;
use Illuminate\Http\JsonResponse;

class ProductionSummaryController extends Controller
{
    public function index(): JsonResponse
    {
        $events = ProductionEvent::whereDate('event_at', today());

        $total = (clone $events)->count();
        $ok = (clone $events)->where('status', 'OK')->count();
        $reject = (clone $events)->where('status', 'REJECT')->count();

        $yield = $total > 0
            ? round(($ok / $total) * 100, 2)
            : 0;

        $rejectRate = $total > 0
            ? round(($reject / $total) * 100, 2)
            : 0;

        return response()->json([
            'date' => today()->toDateString(),
            'total' => $total,
            'ok' => $ok,
            'reject' => $reject,
            'yield' => $yield,
            'reject_rate' => $rejectRate,
        ]);
    }
}
