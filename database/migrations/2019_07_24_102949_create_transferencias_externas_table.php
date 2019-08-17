<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferenciasExternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias_externas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_documento');
            $table->string('destino');
            $table->unsignedBigInteger('transferencia_id');
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
        Schema::dropIfExists('transferencias_externas');
    }
}
