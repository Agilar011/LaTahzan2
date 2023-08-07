<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('otomotifs', function (Blueprint $table) {
            $table->string('foto1')->nullable()->change();
            $table->string('foto2')->nullable()->change();
            $table->string('foto3')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('otomotifs', function (Blueprint $table) {
            $table->string('foto1')->nullable()->change();
            $table->string('foto2')->nullable()->change();
            $table->string('foto3')->nullable()->change();
        });
    }
};
