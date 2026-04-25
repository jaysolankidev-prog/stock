<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement('ALTER TABLE stocks MODIFY size VARCHAR(50) NOT NULL');
            DB::statement('ALTER TABLE stock_logs MODIFY size VARCHAR(50) NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE stocks ALTER COLUMN size TYPE VARCHAR(50) USING size::text');
            DB::statement('ALTER TABLE stock_logs ALTER COLUMN size TYPE VARCHAR(50) USING size::text');
        }
    }

    public function down(): void
    {
        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement('ALTER TABLE stocks MODIFY size INT NOT NULL');
            DB::statement('ALTER TABLE stock_logs MODIFY size INT NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE stocks ALTER COLUMN size TYPE INTEGER USING size::integer');
            DB::statement('ALTER TABLE stock_logs ALTER COLUMN size TYPE INTEGER USING size::integer');
        }
    }
};
