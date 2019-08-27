<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmacenAltualPlacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen_altual_placas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('almacen_actual');
            $table->unsignedBigInteger('placa_id');
            $table->foreign('almacen_actual')->references('id')->on('sucursals');
            $table->foreign('placa_id')->references('id')->on('placas');
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
        Schema::dropIfExists('almacen_altual_placas');
    }
}
