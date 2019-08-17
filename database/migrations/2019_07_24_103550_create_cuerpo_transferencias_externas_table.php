<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuerpoTransferenciasExternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuerpo_transferencias_externas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('moto_id');
            $table->unsignedBigInteger('transferencia_id');
            $table->foreign('moto_id')->references('id')->on('entrada_motocicletas');
            $table->foreign('transferencia_id')->references('id')->on('transferencias_externas');
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
        Schema::dropIfExists('cuerpo_transferencias_externas');
    }
}
