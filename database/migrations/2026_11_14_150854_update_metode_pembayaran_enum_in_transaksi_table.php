<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE transaksi MODIFY metode_pembayaran ENUM('tunai','qris','transfer') NOT NULL DEFAULT 'tunai'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE transaksi MODIFY metode_pembayaran ENUM('tunai','transfer') NOT NULL DEFAULT 'tunai'");
    }
};
