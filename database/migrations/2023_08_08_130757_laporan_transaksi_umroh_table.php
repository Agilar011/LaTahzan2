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
        Schema::create('laporan_transaksi_umroh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user_uploader');
            $table->string('nama_user_uploader');
            $table->string('No_hp_uploader');
            $table->string('nama_paket');
            $table->string('jenis');
            $table->string('deskripsi');
            $table->string('fasilitas1')->nullable();
            $table->string('fasilitas2')->nullable();
            $table->string('fasilitas3')->nullable();
            $table->string('fasilitas4')->nullable();
            $table->string('fasilitas5')->nullable();
            $table->string('fasilitas6')->nullable();
            $table->string('fasilitas7')->nullable();
            $table->string('fasilitas8')->nullable();
            $table->string('fasilitas9')->nullable();
            $table->string('fasilitas10')->nullable();
            $table->date('tanggal_berangkat');
            $table->integer('durasi');
            $table->string('jasa_travel');
            $table->string('Hotel');
            $table->string('Maskapai');
            $table->integer('harga_awal');
            $table->integer('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->integer('jumlah_jemaah');
            $table->string('no_kk');
            $table->string('foto_kk');
            $table->integer('total_biaya_tambahan');
            $table->integer('harga_total');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
