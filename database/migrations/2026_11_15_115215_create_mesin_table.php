<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mesin', function (Blueprint $table) {
            $table->increments('id_mesin');
            $table->string('nama_mesin', 100);
            $table->string('tipe', 50)->nullable();
            $table->string('merk', 50)->nullable();
            $table->integer('kapasitas')->nullable()->comment('dalam kg');
            $table->enum('status', ['aktif', 'servis', 'rusak'])->default('aktif');
            $table->date('tanggal_beli')->nullable();
            $table->date('servis_terakhir')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesin');
    }
};
