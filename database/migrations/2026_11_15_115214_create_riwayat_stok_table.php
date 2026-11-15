<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_stok', function (Blueprint $table) {
            $table->increments('id_riwayat');
            $table->unsignedInteger('id_stok');
            $table->enum('tipe', ['masuk', 'keluar']);
            $table->decimal('jumlah', 10, 2);
            $table->text('keterangan')->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->timestamps();

            $table->foreign('id_stok')->references('id_stok')->on('stok')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_stok');
    }
};
