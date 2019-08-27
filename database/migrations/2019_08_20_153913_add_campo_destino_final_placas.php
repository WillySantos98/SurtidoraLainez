<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoDestinoFinalPlacas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('placas', function (Blueprint $table) {
            $table->unsignedBigInteger('sucursal_final');
            $table->foreign('sucursal_final')->references('id')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('placas', function (Blueprint $table) {
            $table->dropColumn(['sucursal_final']);
        });
    }
}
