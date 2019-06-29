<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionAvalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_avals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('direccion', 250);
            $table->integer('estado');
            $table->unsignedBigInteger('aval_id');
            $table->foreign('aval_id')->references('id')->on('avals');
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
        Schema::dropIfExists('direccion_avals');
    }
}
