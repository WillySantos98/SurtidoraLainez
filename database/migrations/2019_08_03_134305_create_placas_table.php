<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_ingreso');
            $table->string('num_boleta');
            $table->string('comprobante')->nullable();
            $table->date('fecha_vencimiento');
            $table->string('num_placa', 8);
            $table->string('identificacion', 13);
            $table->string('propietario');
            $table->date('ano');
            $table->string('observaciones', 250)->nullable();
            $table->integer('estado');
            $table->unsignedBigInteger('id_moto');
            $table->foreign('id_moto')->references('id')->on('entrada_motocicletas');
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
        Schema::dropIfExists('placas');
    }
}
