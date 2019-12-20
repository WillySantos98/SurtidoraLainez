<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion', 500)->nullable();
            $table->string('codigo')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('observacion1')->nullable();
            $table->string('observacion2')->nullable();
            $table->string('observacion3')->nullable();
            $table->string('observacion4')->nullable();
            $table->string('observacion5')->nullable();
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
        Schema::dropIfExists('bitacora_tareas');
    }
}
