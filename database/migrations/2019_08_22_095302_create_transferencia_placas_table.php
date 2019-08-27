<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferenciaPlacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencia_placas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cod_transferencia');
            $table->unsignedBigInteger('almacen_origen');
            $table->unsignedBigInteger('almacen_final');
            $table->unsignedBigInteger('usuario');
            $table->integer('estado');
            $table->foreign('almacen_origen')->references('id')->on('sucursals');
            $table->foreign('almacen_final')->references('id')->on('sucursals');
            $table->foreign('usuario')->references('id')->on('users');
            $table->string('observaciones');
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
        Schema::dropIfExists('transferencia_placas');
    }
}
