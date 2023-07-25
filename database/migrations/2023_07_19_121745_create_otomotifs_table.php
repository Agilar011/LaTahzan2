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
        Schema::create('otomotifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kendaraan');
            $table->string('deskripsi', 100);
            $table->string('merk');
            $table->integer('kapasitas_mesin');
            $table->string('warna');
            $table->enum('transmisi',['manual','matic']);
            $table->integer('kilometer');
            $table->integer('tahun');
            $table->enum('status',['baru','bekas']);
            $table->string('lokasi');
            $table->integer('harga');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('foto3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otomotifs');
    }
};
