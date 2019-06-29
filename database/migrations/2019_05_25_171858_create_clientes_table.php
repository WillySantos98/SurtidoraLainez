<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres', 40);
            $table->string('apellidos', 40);
            $table->string('identidad',13);
            $table->string('rtn',15);
            //21 anos, aval, constancia, referencias, documento de propiedad o de luz
            //aval ocupa direccion, identidad, referencias, recibo de luz
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
        Schema::dropIfExists('clientes');
    }
}
