<?php

// database/migrations/2023_08_01_XXXXXX_create_extended_umrah_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtendedUmrahTable extends Migration
{
    public function up()
    {
        Schema::create('extended_umrah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_etalase_umroh');
            $table->unsignedBigInteger('upload_by_user_id')->nullable();
            $table->string('upload_by_user_name')->nullable();
            $table->string('No_hp_uploader')->nullable();
            $table->string('thumbnail')->default('default.jpg');
            $table->string('nama_paket');
            $table->enum('jenis',['Umroh','Haji']);
            $table->text('deskripsi');
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
            $table->unsignedBigInteger('approved_display_by_user_id')->nullable();
            $table->string('approved_display_by_user_name')->nullable();
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->integer('jumlah_jemaah');
            $table->string('no_kk')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->integer('harga_total')->nullable();
            $table->enum('status_pembelian',['not yet purchased','pending','purchased'])->default('not yet purchased');
            $table->unsignedBigInteger('approved_payment_by_user_id')->nullable();
            $table->timestamps();

            // Jika menggunakan foreign key, tambahkan baris berikut:
            $table->foreign('upload_by_user_id')->references('id')->on('users');
            $table->foreign('approved_display_by_user_id')->references('id')->on('users');
            $table->foreign('purchased_by_user_id')->references('id')->on('users');
            $table->foreign('approved_payment_by_user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('extended_umrah');
    }
}
