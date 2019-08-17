<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cod_transferencia',20);
            $table->unsignedBigInteger('almacen_salida');
            $table->unsignedBigInteger('encargado_salida');
            $table->unsignedBigInteger('usuario_creacion');
            $table->date('fecha_solicitada');
            $table->date('fecha_decision')->nullable();
            $table->integer('estado');
            $table->foreign('almacen_salida')->references('id')->on('sucursals');
            $table->foreign('encargado_salida')->references('id')->on('colaboradors');
            $table->foreign('usuario_creacion')->references('id')->on('users');
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
        Schema::dropIfExists('transferencias');
    }
}
