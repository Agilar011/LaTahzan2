<?php

// database/migrations/2023_08_01_XXXXXX_create_etalase_umrah_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtalaseUmrahTable extends Migration
{
    public function up()
    {
        Schema::create('etalase_umrah', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->default(null);
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('No_hp')->nullable();
            $table->string('nama_paket');
            $table->string('jenis');
            $table->string('deskripsi');
            $table->date('tanggal_berangkat');
            $table->integer('jumlah_jemaah')->nullable();
            $table->integer('durasi');
            $table->string('jasa_travel');
            $table->string('CP_Admin');
            $table->string('Hotel');
            $table->string('Maskapai');
            $table->decimal('harga', 10, 2);
            $table->decimal('harga_estimasi', 10, 2)->default(0); // Default value 0, bisa diganti sesuai kebutuhan
            $table->string('no_kk')->nullable();
            $table->string('foto_kk')->nullable();
            $table->decimal('harga_total', 12, 2)->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('upload_by_user_id')->nullable();
            $table->string('upload_by_user_name')->nullable();
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->enum('status_etalase',['not yet approved','approved'])->default('not yet approved');
            $table->enum('status_pembelian',['not yet purchased','purchased'])->default('not yet purchased');

            $table->foreign('upload_by_user_id')->references('id')->on('users');
            $table->foreign('approved_by_user_id')->references('id')->on('users');
            $table->foreign('purchased_by_user_id')->references('id')->on('users');




        });
    }

    public function down()
    {
        Schema::dropIfExists('etalase_umrah');
    }
}
