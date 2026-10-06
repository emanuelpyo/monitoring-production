<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('production_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('line_id')
                ->constrained('production_lines')
                ->cascadeOnDelete();
            $table->foreignId('product_id')
                ->constrained('products')
                ->restrictOnDelete();
            $table->enum('status', ['OK', 'REJECT']);
            $table->foreignId('reject_reason_id')
                ->nullable()
                ->constrained('reject_reasons')
                ->nullOnDelete();
            $table->dateTime('event_at')->index();
            $table->timestamp('created_at')->useCurrent();

            $table->index(['line_id', 'event_at']);
            $table->index('reject_reason_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_events');
    }
};
