<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('stock_logs', function (Blueprint $table) {
            $table->dropForeign(['stock_id']);
        });

        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement('ALTER TABLE stock_logs MODIFY stock_id BIGINT UNSIGNED NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE stock_logs ALTER COLUMN stock_id DROP NOT NULL');
        } elseif ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF');
        }

        Schema::table('stock_logs', function (Blueprint $table) {
            $table->string('bag_no')->nullable()->after('stock_id');
            $table->string('category')->nullable()->after('bag_no');
            $table->string('size')->nullable()->after('category');
            $table->decimal('nwt', 8, 2)->nullable()->after('size');

            $table->foreign('stock_id')->references('id')->on('stocks')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('stock_logs', function (Blueprint $table) {
            $table->dropForeign(['stock_id']);
            $table->dropColumn(['bag_no', 'category', 'size', 'nwt']);
        });

        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement('ALTER TABLE stock_logs MODIFY stock_id BIGINT UNSIGNED NOT NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE stock_logs ALTER COLUMN stock_id SET NOT NULL');
        } elseif ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF');
        }

        Schema::table('stock_logs', function (Blueprint $table) {
            $table->foreign('stock_id')->references('id')->on('stocks')->cascadeOnDelete();
        });
    }
};
