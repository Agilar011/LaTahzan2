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
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('No_hp')->nullable();
            $table->string('thumbnail');
            $table->string('nama_paket');
            $table->string('jenis');
            $table->string('deskripsi');
            $table->date('tanggal_berangkat');
            $table->integer('jumlah_jemaah');
            $table->integer('durasi');
            $table->string('jasa_travel');
            $table->unsignedBigInteger('id_Admin');
            $table->string('Nama_Admin');
            $table->string('CP_Admin');
            $table->string('Hotel');
            $table->string('Maskapai');
            $table->decimal('harga_estimasi', 10, 2)->default(0); // Default value 0, bisa diganti sesuai kebutuhan
            $table->string('no_kk');
            $table->string('foto_kk');
            $table->decimal('harga_total', 12, 2)->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->enum('status_etalase',['not yet approved','approved'])->default('not yet approved');
            $table->enum('status_pembelian',['not yet purchased','waiting validation','purchased'])->default('not yet purchased');

            $table->foreign('approved_by_user_id')->references('id')->on('users');

            // Add foreign key constraint for purchased_by_user_id
            $table->foreign('purchased_by_user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('extended_umrah');
    }
}
