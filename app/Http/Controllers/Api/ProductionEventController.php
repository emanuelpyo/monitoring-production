<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductionEventController extends Controller
{
    public function store(
        Request $request,
        ProductionService $productionService
    ): JsonResponse {
        $validated = $request->validate([
            'line' => ['required', 'string', 'exists:production_lines,code'],
            'product' => ['required', 'string', 'exists:products,code'],
            'status' => ['required', Rule::in(['OK', 'REJECT'])],
            'reject_reason_id' => [
                'nullable',
                'integer',
                'exists:reject_reasons,id',
            ],
            'event_at' => ['required', 'date'],
        ]);

        if (
            $validated['status'] === 'REJECT'
            && empty($validated['reject_reason_id'])
        ) {
            return response()->json([
                'message' => 'reject_reason_id is required when status is REJECT.',
            ], 422);
        }

        if (
            $validated['status'] === 'OK'
            && !empty($validated['reject_reason_id'])
        ) {
            return response()->json([
                'message' => 'reject_reason_id must be null when status is OK.',
            ], 422);
        }

        $event = $productionService->recordEvent($validated);

        return response()->json([
            'message' => 'Production event recorded successfully.',
            'data' => $event,
        ], 201);
    }
}
