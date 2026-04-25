<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('bag_no');
            $table->string('size');         // bag size, e.g. 60 or 0.60/75/400
            $table->decimal('nwt', 8, 2);  // Net Weight
            $table->integer('quantity')->default(1);
            $table->string('category')->default('bag'); // bag or extra
            $table->string('extra_type')->nullable();   // grware, yarn, etc.
            $table->string('extra_ply')->nullable();
            $table->string('extra_mm')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
