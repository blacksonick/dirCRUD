<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estado');
            $table->timestamps();
        });
        Schema::create('municipios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('states');
            $table->string('municipio');
            $table->timestamps();
        });
        Schema::create('ciudads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('states');
            $table->string('ciudad');
            $table->timestamps();
        });
        Schema::create('parroquias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_municipio');
            $table->foreign('id_municipio')->references('id')->on('municipios');
            $table->string('parroquia');
            $table->timestamps();
        });
        Schema::create('directions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_municipio');
            $table->unsignedBigInteger('id_ciudad');
            $table->unsignedBigInteger('id_parroquia');
            $table->foreign('id_estado')->references('id')->on('states');
            $table->foreign('id_municipio')->references('id')->on('municipios');
            $table->foreign('id_ciudad')->references('id')->on('ciudads');
            $table->foreign('id_parroquia')->references('id')->on('parroquias');
            $table->string('calle');
            $table->string('avenida');
            $table->string('nro_casa');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('states');
        Schema::dropIfExists('municipios');
        Schema::dropIfExists('ciudads');
        Schema::dropIfExists('parroquias');
        Schema::dropIfExists('directions');
    }
}
