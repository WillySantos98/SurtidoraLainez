<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuerpoTransfereciaInternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuerpo_transferecia_internas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('moto_id');
            $table->unsignedBigInteger('transferencia_id');
            $table->foreign('moto_id')->references('id')->on('entrada_motocicletas');
            $table->foreign('transferencia_id')->references('id')->on('transferencia_internas');
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
        Schema::dropIfExists('cuerpo_transferecia_internas');
    }
}
