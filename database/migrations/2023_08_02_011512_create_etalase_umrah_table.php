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
            $table->unsignedBigInteger('upload_by_user_id');
            $table->string('upload_by_user_name');
            $table->string('No_hp_uploader');
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
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
            $table->enum('status_etalase',['not yet approved','approved'])->default('not yet approved');
            $table->timestamps();

            // Jika menggunakan foreign key, tambahkan baris berikut:
            $table->foreign('upload_by_user_id')->references('id')->on('users');
            $table->foreign('approved_by_user_id')->references('id')->on('users');


        });
    }

    public function down()
    {
        Schema::dropIfExists('etalase_umrah');
    }
}
