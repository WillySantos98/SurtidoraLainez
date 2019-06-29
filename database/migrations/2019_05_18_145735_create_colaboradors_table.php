<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->integer('estado');
            $table->date('fecha_inicio');
            $table->date('fecha_nacimiento');
            $table->string('email');
            $table->string('telefono',8);
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('tipocolaborador_id');
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->foreign('tipocolaborador_id')->references('id')->on('tipo_colaboradors');
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
        Schema::dropIfExists('colaboradors');
    }
}
