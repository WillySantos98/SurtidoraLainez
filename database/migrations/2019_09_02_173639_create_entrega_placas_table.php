<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaPlacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_placas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_entrega');
            $table->string('documento');
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
        Schema::dropIfExists('entrega_placas');
    }
}
