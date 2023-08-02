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
            $table->unsignedBigInteger('id_extended_umrah');
            $table->string('nama_jemaah');
            $table->string('NIK');
            $table->string('No_hp');
            $table->string('no_paspor');
            $table->string('foto_paspor');
            $table->string('foto_KTP');
            $table->string('status_vaksin');
            $table->string('foto_vaksin');
            $table->decimal('biaya_jasa_paspor', 10, 2);
            $table->decimal('biaya_jasa_vaksin', 10, 2);
            $table->decimal('biaya_akhir', 10, 2);
            $table->timestamps();

            $table->foreign('id_extended_umrah')->references('id')->on('extended_umrah');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jemaah');
    }
}
