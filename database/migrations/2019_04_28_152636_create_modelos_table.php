<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_mod', 30);
            $table->unsignedBigInteger('marca_id');
            $table->string('cilindraje');
            $table->unsignedBigInteger('tipovehiculo_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('tipovehiculo_id')->references('id')->on('tipo_vehiculos');
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
        Schema::dropIfExists('modelos');
    }
}
