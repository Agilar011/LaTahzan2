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
        Schema::create('otomotifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_kendaraan');
            $table->string('deskripsi', 100);
            $table->string('merk');
            $table->integer('kapasitas_mesin');
            $table->string('warna');
            $table->enum('transmisi',['manual','matic']);
            $table->integer('kilometer');
            $table->integer('tahun');
            $table->enum('status',['baru','bekas']);
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->integer('harga');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto_bpkb');
            $table->string('foto_stnk');
            $table->string('foto_ktp');
            $table->timestamps();
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
            $table->unsignedBigInteger('purchased_by_user_id')->nullable();
            $table->string('purchased_by_user_name')->nullable();
            $table->enum('status_etalase',['not yet approved','approved'])->default('not yet approved');
            $table->enum('status_pembelian',['not yet purchased','purchased'])->default('not yet purchased');

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
     */
    public function down(): void
    {
        Schema::dropIfExists('otomotifs');
    }
};
