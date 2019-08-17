<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosPlacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_placas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->unsignedBigInteger('id_placa');
            $table->foreign('id_placa')->references('id')->on('placas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos_placas');
    }
}
