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
        Schema::create('umrah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Kolom kunci asing untuk relasi ke tabel users
            $table->string('nama_user')->nullable();
            $table->string('no_HP_User')->nullable();
            $table->string('nama_paket');
            $table->string('jenis');
            $table->date('tgl_berangkat');
            $table->integer('jumlah_jemaah');
            $table->integer('durasi');
            $table->string('jasa_travel');
            $table->string('CP_Admin');
            $table->string('hotel');
            $table->string('maskapai');
            $table->integer('harga');
            $table->timestamps();

            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->string('approved_by_user_name')->nullable();
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
        Schema::dropIfExists('umrah');
    }
};
