<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stock_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id')->constrained()->onDelete('cascade');
            $table->string('action');           // ADD or SUBTRACT
            $table->integer('quantity_changed');
            $table->integer('quantity_before');
            $table->integer('quantity_after');
            $table->string('note')->nullable();
            $table->timestamp('logged_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_logs');
    }
};
