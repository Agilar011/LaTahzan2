<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_property', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_property');
            $table->string('jenis');
            $table->string('deskripsi', 100);
            $table->string('Alamat');
            $table->string('Kecamatan');
            $table->string('Kota');
            $table->string('luas_tanah');
            $table->string('luas_bangunan');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('foto3');
            $table->string('foto_Sertifikat');
            $table->integer('harga');
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->enum('status_etalase',['not yet approved','approved'])->default('not yet approved');
            $table->enum('status_pembelian',['not yet purchased','purchased'])->default('not yet purchased');
            $table->timestamps();

            // Add foreign key constraint for user_id
            $table->foreign('user_id')->references('id')->on('users');

            // Add foreign key constraint for approved_by_user_id
            $table->foreign('approved_by_user_id')->references('id')->on('users');

            // Add foreign key constraint for purchased_by_user_id
            $table->foreign('purchased_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_property');
    }
}
