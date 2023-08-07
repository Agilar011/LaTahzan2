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
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->integer('harga');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto_bpkb');
            $table->string('foto_stnk');
            $table->string('foto_ktp');
            $table->enum('status_step',['input','etalase','transaksi','report']);
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
