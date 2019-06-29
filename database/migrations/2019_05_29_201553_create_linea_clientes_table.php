<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineaClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('identidad');
            $table->integer('rtn');
            $table->integer('telefono');
            $table->integer('direccion');
            $table->integer('identidad_escaneada');
            $table->integer('rtn_escaneada');
            $table->integer('ip_800');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('linea_clientes');
    }
}
