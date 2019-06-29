<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cod_venta')->unique();
            $table->unsignedBigInteger('tipoventa_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('moto_id');
            $table->date('fecha_salida');
            $table->string('obsrvacion',250);
            $table->foreign('tipoventa_id')->references('id')->on('tipo_ventas');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('moto_id')->references('id')->on('entrada_motocicletas');
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
        Schema::dropIfExists('salidas');
    }
}
