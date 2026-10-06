<?php

use App\Http\Controllers\Api\ProductionEventController;
use App\Http\Controllers\Api\ProductionLineController;
use App\Http\Controllers\Api\ProductionSummaryController;
use App\Http\Controllers\Api\RecentProductionEventController;
use App\Http\Controllers\Api\RejectAnalysisController;
use Illuminate\Support\Facades\Route;

Route::post('/production-events', [ProductionEventController::class, 'store']);
Route::get('/production-summary', [ProductionSummaryController::class, 'index']);
Route::get('/production-lines', [ProductionLineController::class, 'index']);
Route::get('/production-events/recent', [RecentProductionEventController::class, 'index']);
Route::get('/reject-analysis', [RejectAnalysisController::class, 'index']);
