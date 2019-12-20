<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_modelos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('precio_s_impuesto');
            $table->string('margen_utilidad');
            $table->unsignedBigInteger('id_impuesto');
            $table->string('precio1');
            $table->unsignedBigInteger('id_gastos_administrativos');
            $table->string('precio2');
            $table->string('margen_anual');
            $table->string('prima_minima');
            $table->string('observacion',1000)->nullable();
            $table->unsignedBigInteger('modelo_id');
            $table->date('ultima_modificacion');
            $table->foreign('id_impuesto')->references('id')->on('impuestos');
            $table->foreign('id_gastos_administrativos')->references('id')->on('gastos_administrativos');
            $table->foreign('modelo_id')->references('id')->on('modelos');
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
        Schema::dropIfExists('precios_modelos');
    }
}
