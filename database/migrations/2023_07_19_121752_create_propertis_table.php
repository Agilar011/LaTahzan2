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
        Schema::create('propertis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_properti');
            $table->string('jenis');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('foto3');
            $table->string('foto_sertifikat');
            $table->string('deskripsi');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->integer('luas');
            $table->bigInteger('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propertis');
    }
};
