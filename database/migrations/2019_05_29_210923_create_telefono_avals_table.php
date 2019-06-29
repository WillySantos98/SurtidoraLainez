<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonoAvalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefono_avals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero', 12);
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
        Schema::dropIfExists('telefono_avals');
    }
}
