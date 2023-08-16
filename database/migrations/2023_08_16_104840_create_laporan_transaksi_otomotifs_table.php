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
        Schema::create('laporan_transaksi_otomotifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upload_by_user_id')->nullable();
            $table->string('upload_by_user_name')->nullable();
            $table->string('no_hp_uploader')->nullable();
            $table->string('nama_kendaraan')->nullable();
            $table->string('deskripsi', 100)->nullable();
            $table->string('merk')->nullable();
            $table->integer('kapasitas_mesin')->nullable();
            $table->string('warna')->nullable();
            $table->enum('transmisi',['manual','matic'])->nullable();
            $table->integer('kilometer')->nullable();
            $table->integer('tahun')->nullable();
            $table->enum('status',['baru','bekas'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->integer('harga')->nullable();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto_bpkb')->nullable();
            $table->string('foto_stnk')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->string('purchased_by_user_phone_number')->nullable();
            $table->enum('status_etalase',['not yet approved','approved'])->default('not yet approved');
            $table->enum('status_pembelian',['not yet purchased','purchased'])->default('not yet purchased');
            $table->unsignedBigInteger('approved_payment_by_user_id')->nullable();
            $table->string('approved_payment_by_user_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_transaksi_otomotifs');
    }
};
