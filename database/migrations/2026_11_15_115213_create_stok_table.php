<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->increments('id_stok');
            $table->string('nama_item', 100);
            $table->string('kategori', 50)->nullable();
            $table->decimal('stok_sekarang', 10, 2)->default(0);
            $table->decimal('stok_minimum', 10, 2)->default(0);
            $table->string('satuan', 20)->default('pcs');
            $table->integer('harga_satuan')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
