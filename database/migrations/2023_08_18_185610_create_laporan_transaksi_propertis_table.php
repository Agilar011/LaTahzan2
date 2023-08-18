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
        Schema::create('laporan_transaksi_properti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upload_by_user_id')->nullable();
            $table->string('upload_by_user_name')->nullable();
            $table->string('no_hp_uploader')->nullable();
            $table->string('nama_kendaraan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('merk')->nullable();
            $table->string('kapasitas_mesin')->nullable();
            $table->string('warna')->nullable();
            $table->string('transmisi')->nullable();
            $table->string('kilometer')->nullable();
            $table->string('tahun')->nullable();
            $table->string('status')->nullable();
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
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->string('foto_ktp_purchaser')->nullable();
            $table->string('no_ktp_purchaser')->nullable();
            $table->string('purchased_by_user_phone_number')->nullable();
            $table->string('status_etalase')->nullable();
            $table->string('status_pembelian')->nullable();
            $table->unsignedBigInteger('approved_payment_by_user_id')->nullable();
            $table->string('approved_payment_by_user_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_transaksi_propertis');
    }
};
