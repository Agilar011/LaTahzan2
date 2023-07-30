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
        Schema::create('umrohs', function (Blueprint $table) {

            $table->id();
            $table->string('nama_paket');
            $table->string('jenis');
            $table->string('deskripsi');
            $table->date('tanggal_berangkat');
            $table->integer('durasi');
            $table->string('jasa_travel');
            $table->string('cp_travel');
            $table->string('hotel');
            $table->string('maskapai');
            $table->bigInteger('harga');
            $table->string('foto');
            $table->enum('status_step',['input','etalase','transaksi','report']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umrohs');
    }
};
