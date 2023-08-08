<?php

// database/migrations/2023_08_01_XXXXXX_create_extended_umrah_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiUmrohTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_umroh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_etalase_umroh');
            $table->unsignedBigInteger('upload_by_user_id');
            $table->string('upload_by_user_name');
            $table->string('No_hp_uploader');
            $table->string('thumbnail');
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
            $table->decimal('harga_awal', 11, 2);
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->integer('jumlah_jemaah')->default(0);
            $table->decimal('harga_estimasi', 10, 2)->default(0); // Default value 0, bisa diganti sesuai kebutuhan
            $table->string('no_kk');
            $table->string('foto_kk');
            $table->decimal('harga_total', 12, 2)->default(0);
            $table->enum('status_pembelian',['not yet purchased','waiting validation','purchased'])->default('not yet purchased');
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->timestamps();

            $table->foreign('approved_by_user_id')->references('id')->on('users');
            // Add foreign key constraint for purchased_by_user_id
            $table->foreign('purchased_by_user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_umroh');
    }
}
