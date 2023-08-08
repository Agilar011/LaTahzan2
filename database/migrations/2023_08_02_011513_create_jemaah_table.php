<?php

// database/migrations/2023_08_01_XXXXXX_create_jemaah_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaahTable extends Migration
{
    public function up()
    {
        Schema::create('jemaah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaksi_umroh');
            $table->string('nama_jemaah');
            $table->string('NIK');
            $table->string('No_hp');
            $table->string('foto_identitas');
            $table->enum('status_paspor', ['Sudah', 'Belum'])->default('Belum');
            $table->string('no_paspor');
            $table->string('foto_paspor');
            $table->decimal('biaya_jasa_paspor', 10, 2)->default(0);
            $table->enum('status_vaksin', ['Sudah', 'Belum'])->default('Belum');
            $table->string('foto_vaksin');
            $table->decimal('biaya_jasa_vaksin', 10, 2)->default(0);
            $table->decimal('biaya_awal', 10, 2)->default(0);
            $table->decimal('biaya_akhir', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('id_transaksi_umroh')->references('id')->on('transaksi_umroh');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jemaah');
    }
}
