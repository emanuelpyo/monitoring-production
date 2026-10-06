<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductionEvent;
use Illuminate\Http\JsonResponse;

class RejectAnalysisController extends Controller
{
    public function index(): JsonResponse
    {
        $analysis = ProductionEvent::query()
            ->whereDate('event_at', today())
            ->where('status', 'REJECT')
            ->whereNotNull('reject_reason_id')
            ->join(
                'reject_reasons',
                'production_events.reject_reason_id',
                '=',
                'reject_reasons.id'
            )
            ->selectRaw('reject_reasons.id, reject_reasons.name, COUNT(*) as total')
            ->groupBy('reject_reasons.id', 'reject_reasons.name')
            ->orderByDesc('total')
            ->get();

        return response()->json([
            'date' => today()->toDateString(),
            'data' => $analysis,
        ]);
    }
}
