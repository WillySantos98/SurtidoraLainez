<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferenciaInternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencia_internas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transferencia_id');
            $table->string('cod_transferencia',20);
            $table->unsignedBigInteger('almacen_destino');
            $table->unsignedBigInteger('encargado_destino');
            $table->unsignedBigInteger('usuario_decision');
            $table->foreign('usuario_decision')->references('id')->on('users');
            $table->foreign('encargado_destino')->references('id')->on('colaboradors');
            $table->foreign('almacen_destino')->references('id')->on('sucursals');
            $table->foreign('transferencia_id')->references('id')->on('transferencias');
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
        Schema::dropIfExists('transferencia_internas');
    }
}
