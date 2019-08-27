<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuerpoTransferenciaPlacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuerpo_transferencia_placas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transferencia_id');
            $table->foreign('transferencia_id')->references('id')->on('transferencia_placas');
            $table->unsignedBigInteger('placa_id');
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
        Schema::dropIfExists('cuerpo_transferencia_placas');
    }
}
