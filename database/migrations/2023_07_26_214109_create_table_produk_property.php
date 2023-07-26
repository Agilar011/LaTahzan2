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
        Schema::create('table_produk_property', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_property');
            $table->string('jenis');
            $table->string('deskripsi', 600);
            $table->string('Alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->integer('luas_tanah');
            $table->integer('luas_bangunan');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('foto3');
            $table->string('foto_Sertifikat');
            $table->integer('harga');
            $table->unsignedBigInteger('approved_by_user_id')->nullable(); // New column for the user who approves the product
            $table->string('approved_by_user_name')->nullable(); // New column for the user who approves the product
            $table->unsignedBigInteger('purchased_by_user_id')->nullable(); // New column for the user who purchased the product
            $table->string('purchased_by_user_name')->nullable(); // New column for the user who purchased the product
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
     */
    public function down(): void
    {
        Schema::dropIfExists('table_produk_property');
    }
};
