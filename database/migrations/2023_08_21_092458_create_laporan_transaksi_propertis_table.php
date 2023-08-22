<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('laporan_transaksi_propertis', function (Blueprint $table) {
            $table->id();
            // Tambahkan kolom sesuai dengan kebutuhan
            $table->unsignedBigInteger('upload_by_user_id');
            $table->string('upload_by_user_name');
            $table->string('no_hp_uploader');
            $table->string('nama_properti');
            $table->string('jenis')->nullable();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto_sertifikat');
            $table->string('foto_ktp');
            $table->string('deskripsi');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->integer('luas');
            $table->bigInteger('harga');
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->string('foto_ktp_purchaser')->nullable();
            $table->string('no_ktp_purchaser')->nullable();
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
        Schema::dropIfExists('laporan_transaksi_propertis');
    }
};
